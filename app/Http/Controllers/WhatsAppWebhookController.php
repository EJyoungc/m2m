
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppWebhookController extends Controller
{
    public function handleWebhook(Request $request)
{
    // Verification of the webhook (WhatsApp will send a GET request to verify)
    if ($request->isMethod('get')) {
        $verifyToken = env('WHATSAPP_WEBHOOK_VERIFY_TOKEN');
        $mode = $request->query('hub_mode');
        $token = $request->query('hub_verify_token');
        $challenge = $request->query('hub_challenge');

        if ($mode === 'subscribe' && $token === $verifyToken) {
            return response($challenge, 200);
        } else {
            return response('Forbidden', 403);
        }
    }

    // Handle webhook data (POST request)
    $data = $request->all();

    // Process the messages or event data...
    // (as shown in step 2)

    return response()->json(['status' => 'success'], 200);
}

}
