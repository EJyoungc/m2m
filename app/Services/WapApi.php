<?php
<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class WapAPI
{
    protected $client;
    protected $apiUrl;
    protected $token;
    protected $chatId;
    protected $text;
    protected $btnId;
    protected $imgUrl;

    // Constructor to initialize the client and token
    public function __construct($token = null)
    {
        $this->apiUrl = env('WHATSAPP_API_URL'); // WhatsApp API URL
        $this->token = $token ?? env('WHATSAPP_API_TOKEN'); // Access token
        $this->client = new Client([
            'base_uri' => $this->apiUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    // Method to set the token dynamically
    public static function token($token)
    {
        return new static($token);
    }

    // Function to process incoming WhatsApp Webhook updates
    public function updates($request)
    {
        $data = json_decode($request->getContent(), true);

        // Parse incoming data from WhatsApp
        if (isset($data['entry'][0]['changes'][0]['value']['messages'][0])) {
            $messageData = $data['entry'][0]['changes'][0]['value']['messages'][0];
            
            // Set the chat ID
            $this->chatId = $messageData['from'] ?? null;

            // Set the message text if it's a text message
            $this->text = $messageData['text']['body'] ?? null;

            // Set the button ID if it's a button response
            $this->btnId = $messageData['interactive']['button_reply']['id'] ?? null;

            // Set the image URL if it's an image message
            $this->imgUrl = $messageData['image']['link'] ?? null;
        }

        return $this; // Return the instance for method chaining
    }

    // Getter for chainable get
    public function get()
    {
        return $this;
    }

    // Getter and setter for chatId
    public function chatId($chatId = null)
    {
        if ($chatId) {
            $this->chatId = $chatId;
        }
        return $this->chatId;
    }

    // Getter and setter for text
    public function text($text = null)
    {
        if ($text) {
            $this->text = $text;
        }
        return $this->text;
    }

    // Getter and setter for button ID
    public function btnId($btnId = null)
    {
        if ($btnId) {
            $this->btnId = $btnId;
        }
        return $this->btnId;
    }

    // Getter and setter for image URL
    public function img($imgUrl = null)
    {
        if ($imgUrl) {
            $this->imgUrl = $imgUrl;
        }
        return $this->imgUrl;
    }

    // Method to send messages (msg)
    public function msg()
    {
        return $this;
    }

    // Send a regular text message
    public function send()
    {
        try {
            $payload = [
                'messaging_product' => 'whatsapp',
                'to' => $this->chatId,
                'type' => 'text',
                'text' => [
                    'body' => $this->text,
                ],
            ];

            $response = $this->client->post('', ['json' => $payload]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->getResponse() ? json_decode($e->getResponse()->getBody(), true) : null,
            ];
        }
    }

    // Send a button message
    public function btn(array $buttons)
    {
        try {
            $payload = [
                'messaging_product' => 'whatsapp',
                'to' => $this->chatId,
                'type' => 'interactive',
                'interactive' => [
                    'type' => 'button',
                    'body' => [
                        'text' => $this->text,
                    ],
                    'action' => [
                        'buttons' => $buttons,
                    ],
                ],
            ];

            $response = $this->client->post('', ['json' => $payload]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->getResponse() ? json_decode($e->getResponse()->getBody(), true) : null,
            ];
        }
    }

    // Send an image message
    public function imgSend()
    {
        try {
            $payload = [
                'messaging_product' => 'whatsapp',
                'to' => $this->chatId,
                'type' => 'image',
                'image' => [
                    'link' => $this->imgUrl,
                ],
            ];

            $response = $this->client->post('', ['json' => $payload]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->getResponse() ? json_decode($e->getResponse()->getBody(), true) : null,
            ];
        }
    }

    // Show typing indicator
    public function typingIndicator($show = true)
    {
        try {
            $payload = [
                'messaging_product' => 'whatsapp',
                'to' => $this->chatId,
                'type' => 'action',
                'action' => [
                    'status' => $show ? 'typing_on' : 'typing_off',
                ],
            ];

            $response = $this->client->post('', ['json' => $payload]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->getResponse() ? json_decode($e->getResponse()->getBody(), true) : null,
            ];
        }
    }

    // Mark a message as read
    public function markAsRead($messageId)
    {
        try {
            $payload = [
                'messaging_product' => 'whatsapp',
                'to' => $this->chatId,
                'type' => 'action',
                'action' => [
                    'message_id' => $messageId,
                    'status' => 'read',
                ],
            ];

            $response = $this->client->post('', ['json' => $payload]);

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
