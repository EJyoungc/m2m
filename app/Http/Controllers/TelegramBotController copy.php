<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
    private static $userStates = [];
    private static $validNumber = '123456'; // Single valid number for validation

    public function handleWebhook(Request $request)
    {
        $update = Telegram::getWebhookUpdates();
        $chatId = $update->getMessage()->getChat()->getId();
        $text = $update->getMessage()->getText();

        // Initialize user state if not set
        if (!isset(self::$userStates[$chatId])) {
            self::$userStates[$chatId] = [
                'state' => 'start', // Initial state
                'number' => null,    // Store the number the user inputs
            ];
        }

       
        // Handle different states of the conversation
        switch (self::$userStates[$chatId]['state']) {
            case 'start':
                $this->handleStart($chatId, $text);
                break;

            case 'waiting_for_number':
                $this->handleNumberInput($chatId, $text);
                break;

            case 'waiting_for_confirmation':
                $this->handleConfirmation($chatId, $text);
                break;

            default:

            if(self::$userStates[$chatId]['state'] == 'waiting_for_option') {
                $this->handleNumberInput($chatId, $text);

                
            }else{
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "I didn't understand that. Please choose a valid option."
                ]);
                $this->sendMenu($chatId);
            }
        }

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => "Current state:".self::$userStates[$chatId]['state']
        ]);

        info(dump($update));
    }

    private function handleStart($chatId, $text)
    {
        
        switch ($text) {
            case '/start':
                $this->sendMenu($chatId);
                // self::$userStates[$chatId]['state'] = 'start';
                break;

            case 'Provide Art Number:':
                $this->handleOption1($chatId);
                break;

            case 'Client:':
                $this->handleOption2($chatId);
                break;

            default:
                // If the input is not a valid option, notify the user
                
                if(self::$userStates[$chatId]['state'] == 'waiting_for_option') {
                    $this->handleNumberInput($chatId, $text);
    
                    
                }else{
                    Telegram::sendMessage([
                        'chat_id' => $chatId,
                        'text' => "I didn't understand that. Please choose a valid option."
                    ]);
                    $this->sendMenu($chatId);
                }
        }
    }

    private function sendMenu($chatId)
    {
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Please choose an option:',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [
                        ['text' => 'Provide Art Number:'],
                         ['text' => 'Client:']
                        ]
                ],
                'resize_keyboard' => true,
                'one_time_keyboard' => true,
            ]),
        ]);
    }

    private function handleOption1($chatId)
    {
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Please enter your art number.',
        ]);

        // Set the state to waiting for the user to input a number
        self::$userStates[$chatId]['state'] = 'waiting_for_number';
    }

    private function handleNumberInput($chatId, $text)
    {
        if (is_numeric($text)) {
            // Store the number in the user state
            self::$userStates[$chatId]['number'] = $text;

            // Validate the number
            if ($text == self::$validNumber) {
                // Ask for confirmation
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => "You entered the number {$text}. Is this correct? (yes/no)",
                ]);

                // Set the state to waiting for confirmation
                self::$userStates[$chatId]['state'] = 'waiting_for_confirmation';
            } else {
                // If the number is not valid, notify the user
                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'text' => 'The number you entered is invalid. Please try again.',
                ]);

                // Stay in the same state, waiting for a valid number
                self::$userStates[$chatId]['state'] = 'waiting_for_number';
            }
        } else {
            // If the input is not a number, ask again
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Please enter a valid number.',
            ]);
        }
    }

    private function handleConfirmation($chatId, $text)
    {
        if (strtolower($text) === 'yes') {
            $number = self::$userStates[$chatId]['number'];

            // Confirm the number, save it, and end the process
            // Simulate saving the number (you can replace this with actual saving logic)
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "Number {$number} has been saved successfully.",
            ]);

            // Reset the state back to the start
            self::$userStates[$chatId]['state'] = 'start';

        } elseif (strtolower($text) === 'no') {
            // If the user says "no," ask for the number again
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => 'Okay, please enter the number again.',
            ]);

            // Set the state back to waiting for a number
            self::$userStates[$chatId]['state'] = 'waiting_for_number';
        } else {
            // If the response is not "yes" or "no," ask for confirmation again
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => "Please respond with 'yes' or 'no'.",
            ]);
        }
    }

    private function handleOption2($chatId)
    {
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'You selected Client option.',
        ]);
    }
}
