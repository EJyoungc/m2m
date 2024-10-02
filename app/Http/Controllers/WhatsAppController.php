<?php

namespace App\Http\Controllers;

use App\Services\WhatsAppService;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    //

    protected $whatsAppService;

    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }
    public function sendWhatsAppMessage()
    {
        $recipient = 'recipient_phone_number';
        $message = 'Hello from Laravel WhatsApp API!';
        $response = $this->whatsAppService->sendMessage($recipient, $message);

        return response()->json($response);
    }
}
