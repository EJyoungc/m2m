<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsAppWebhookController extends Controller
{
    public function handleWebhook(Request $request)
{

    log('hello');
    // Verification of the webhook (WhatsApp will send a GET request to verify)
    $mode = $request->query('hub_mode');
        $challenge = $request->query('hub_challenge');
        $token = $request->query('hub_verify_token');
        // dd($token,$challenge,$mode);
        Log::info($token);
        Log::info($challenge);
        Log::info($mode);
        if($mode == 'subscribe' &&  $token == 'root' ){
            return response($_GET['hub_challenge'],200);
        }else{
            // return response('',403);
        

        }
    }

}
