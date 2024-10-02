<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Telegram\Bot\Laravel\Facades\Telegram;

class DailyAppointment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-appointment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $ap = Appointment::All();
        foreach ($ap as $key => $item) {
            $date = strtotime($item['appointment']);
            $appointment = date('y-m-d', $date);
            $date_before = Carbon::createFromFormat('y-m-d', $appointment)->subDays(2);
            if ($date_before <= Carbon::now()) {

                $text = 'Dear ' . $item->client->firstname . ' ' . $item->client->lastname . ' you have M2M appontment on the ' . Carbon::parse($appointment)->format('D m Y') . ' at ' . "8:00 AM"; //Carbon::parse($appointment)->format('h:i P');
                //  $smsClient->messages->create($item->client->tel,['from'=>$number, 'body' => $text ]);
                // $msg = $appointment."appointment id ".$item['id'] ." is sent to ".$item->client->firstname;
                if (!empty($item->client->chat_id)) {
                    Telegram::sendMessage([
                        'chat_id' => $item->client->chat_id,
                        'text' => $text
                    ]);
                }
                return info([$text, $item->client->chat_id] );
            } else {
                return info('no rows available  date before is ' . $date_before . " now date is " . Carbon::now());
            }
        }
    }
}
