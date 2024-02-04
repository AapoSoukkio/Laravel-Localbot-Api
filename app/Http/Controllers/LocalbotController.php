<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalbotController extends Controller
{
        public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');
        
        // TODO: add the logic to communicate with Dockerized LLM
        // This could involve sending a HTTP request to a web server running in Docker,
        // or executing a Docker command directly if necessary.
        
        $botResponse = 'Response from aapo'; // Placeholder for actual LLM response

        return response()->json(['message' => $botResponse]);
    }
}
