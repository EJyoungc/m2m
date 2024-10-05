<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\WhatsAppService;

class WhatsAppWebhookController extends Controller
{


    protected $Bot;

    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->Bot = $whatsAppService;
    }


    public function handleWebhook(Request $request)
    {

        // 1. Handle webhook verification (GET request)
        if ($request->isMethod('get')) {
            $mode = $request->query('hub_mode');
            $challenge = $request->query('hub_challenge');
            $token = $request->query('hub_verify_token');


            if ($mode == 'subscribe' &&  $token == 'root') {
                // Log::info('end of webhook');
                return response($_GET['hub_challenge'], 200);
            } else {
                return response('forbidden', 403);
            }
        }

       
    }


    public function test(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();

            // Process incoming messages or events
            if (isset($data['entry'][0]['changes'][0]['value']['messages'])) {
                $messages = $data['entry'][0]['changes'][0]['value']['messages'];

                // Loop through received messages
                foreach ($messages as $message) {
                    $from = $message['from']; // Sender's phone number
                    $messageBody = $message['text']['body']; // Message content

                    // Process or log the received message
                    Log::info("Message received from: $from - Message: $messageBody");

                    // Define basic chatbot responses
                    $responseMessage = $this->generateChatbotResponse($messageBody);

                    // Send the response back to the user
                    $this->Bot->sendMessage(
                        $from, 
                        $responseMessage,
                        [
                            [
                                'type' => 'reply',
                                'reply' => [
                                    'id' => 'btn_1',
                                    'title' => 'Get Info'
                                ]
                            ],
                            [
                                'type' => 'reply',
                                'reply' => [
                                    'id' => 'btn_2',
                                    'title' => 'Contact Support'
                                ]
                            ]
                        ]);
                }
            }

            // Return a success response to acknowledge the webhook event
            return response()->json(['status' => 'success'], 200);
        } 


    }


    private function generateChatbotResponse($userMessage)
    {
        if (strpos($userMessage, 'hello') !== false || strpos($userMessage, 'hi') !== false) {
            return "Hello! How can I assist you today?";
        } elseif (strpos($userMessage, 'bye') !== false) {
            return "Goodbye! Have a great day!";
        } elseif (strpos($userMessage, 'help') !== false) {
            return "Here are some things I can assist with:\n1. Ask about our services\n2. Get contact info\n3. Other inquiries";
        } else {
            return "Sorry, I didn't understand that. You can type 'help' to see what I can do.";
        }
    }
}
