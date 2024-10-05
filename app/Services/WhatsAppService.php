<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class WhatsAppService
{
    protected $client;
    protected $apiUrl;
    protected $token;

    public function __construct()
    {
        $this->apiUrl = env('WHATSAPP_API_URL'); // WhatsApp API URL
        $this->token = env('WHATSAPP_API_TOKEN'); // Access token
        $this->client = new Client([
            'base_uri' => $this->apiUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    // Function to send a text message or a button message
    public function sendMessage($recipient, $message, $buttons = [])
    {
        try {
            $payload = [
                'messaging_product' => 'whatsapp',
                'to' => $recipient,
            ];

            // Check if we are sending a regular text message or a button message
            if (empty($buttons)) {
                // Regular text message
                $payload['type'] = 'text';
                $payload['text'] = ['body' => $message];
            } else {
                // Interactive button message
                $payload['type'] = 'interactive';
                $payload['interactive'] = [
                    'type' => 'button',
                    'body' => [
                        'text' => $message,
                    ],
                    'action' => [
                        'buttons' => $buttons,
                    ],
                ];
            }

            // Send the request
            $response = $this->client->post('', [
                'json' => $payload,
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->getResponse() ? json_decode($e->getResponse()->getBody(), true) : null,
            ];
        }
    }
}
