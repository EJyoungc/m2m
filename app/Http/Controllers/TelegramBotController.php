<?php


namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\Update;

class TelegramBotController extends Controller
{
    // Store user states and valid numbers
    private static $validNumbers = 123456; // Hard-coded valid number

    // Main method to handle webhook updates
    public function handleWebhook(Request $request)
    {
        $update = Telegram::getWebhookUpdates();
        $chatId = $update->getMessage()->getChat()->getId();
        $text = $update->getMessage()->getText();

        // Get user state from cache, or set to "start" if not set
        $userState = Cache::get("user_state_{$chatId}", 'start');

        if ($text == "/start" || $userState == "start") {
            Cache::put("user_state_{$chatId}", "waiting_for_number", 600);
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "Please provide an ART number:"
            ]);
        }

        if ($userState == "waiting_for_number") {
            if (is_numeric($text)) {
                if (self::$validNumbers == $text) {
                    // Fetch the patient and cache the patient ID and user state
                    $patient = Patient::where('art_number', $text)->first();
                    Cache::put("user_state_{$chatId}", "confirm_account", 600);
                    Cache::put("patient_id_{$chatId}", $patient->id, 600);

                    // Send confirmation message
                    Telegram::sendMessage([
                        'chat_id' => $chatId,
                        'text' => "Hello {$patient->firstname} {$patient->lastname} ({$patient->art_number})! ",
                    ]);
                    Telegram::sendMessage([
                        'chat_id' => $chatId,
                        'text' => "Please confirm if this Account should be linked to the following Patient: {$patient->firstname} {$patient->lastname} ({$patient->art_number})",
                        'reply_markup' => json_encode([
                            'keyboard' => [
                                [
                                    ['text' => 'Confirm'],
                                    ['text' => 'Cancel']
                                ]
                            ],
                            'resize_keyboard' => true,
                            'one_time_keyboard' => true,
                        ]),
                    ]);
                }
            }
        }

        if ($userState == "confirm_account") {
            if ($text == "Confirm") {
                Cache::put("user_state_{$chatId}", "menu", 600);

                // Get the cached patient ID and save the chat_id
                $patientId = Cache::get("patient_id_{$chatId}");
                if ($patientId) {
                    $patient = Patient::find($patientId);
                    $patient->chat_id = $chatId;
                    $patient->save();

                    Telegram::sendMessage([
                        'chat_id' => $chatId,
                        'text' => 'Account linked successfully!',
                        'reply_markup' => json_encode([
                            'keyboard' => [
                                [
                                    ['text' => 'Last Appointment'],
                                    ['text' => 'Upcoming Appointment']
                                ]
                            ],
                            'resize_keyboard' => true,
                            'one_time_keyboard' => true,
                        ]),
                    ]);

                    $patient = Patient::where('chat_id', $chatId)->first();
                    $appointmentscount = Appointment::where('client_id', $patient->id)->get()->count();
                    $lastAppointment = Appointment::where('client_id', $patient->id)->latest()->first();
                    $time = Carbon::parse($lastAppointment->updated_at)->format('h:i A');
                    $date = Carbon::parse($lastAppointment->appointment)->format('d-m-Y');

                    Telegram::sendMessage([
                        'chat_id' => $chatId,
                        'text' => " {$patient->firstname} {$patient->lastname} \n\n Number of Appointments : {$appointmentscount}, \n Last Appointment Date: {$date} {$time}  \n Status: {$lastAppointment->status} ",
                    ]);

                    Cache::put("user_state_{$chatId}", "menu_options", 600);
                }
            }
        }

        if ($userState == "menu_options") {
            if ($text == "Upcoming Appointment") {
                $patient = Patient::where('chat_id', $chatId)->first();
                $upcomingAppointment = Appointment::where('client_id', $patient->id)->latest()->first();

                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "Upcoming Appointment: Date: {$upcomingAppointment->date}, Time: {$upcomingAppointment->time}, Status: {$upcomingAppointment->status} ",
                ]);
            }

            if ($text == "Last Appointment") {
                $patient = Patient::where('chat_id', $chatId)->first();

                $lastAppointment = Appointment::where('client_id', $patient->id)->oldest()->first();
                $time = Carbon::parse($lastAppointment->updated_at)->format('h:i A');
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "Last Appointment: Date: {$lastAppointment->appointment}, \n\n Time: {$time}, \n\n Status: {$lastAppointment->status}",
                ]);
            }
        }
    }
}
