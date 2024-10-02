<?php

namespace App\Services;

use GuzzleHttp\Client;

class WhatsAppService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('WHATSAPP_API_URL'),
            'headers'  => [
                'Authorization' => 'Bearer ' . env('WHATSAPP_API_TOKEN'),
                'Content-Type'  => 'application/json',
            ],
        ]);
    }

    public function sendMessage($recipient, $message)
    {
        $response = $this->client->post('', [
            'json' => [
                'messaging_product' => 'whatsapp',
                'to'                => $recipient,
                'type'              => 'text',
                'text'              => ['body' => $message],
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
