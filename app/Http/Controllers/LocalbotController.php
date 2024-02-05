<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocalbotController extends Controller
{
    public function sendMessage(Request $request)
{
    $userMessage = $request->input('message');

    $postData = [
        'model' => 'llama2',
        'prompt' => $userMessage,
        'stream' => false,
        'format' => 'json'
    ];

    $response = Http::timeout(60) 
               ->post('http://localhost:11434/api/generate', $postData);

    // Decode the JSON response
    $botResponse = $response->json();

    if (isset($botResponse['response'])) {
        return response()->json(['message' => $botResponse['response']]);
    } else {
        \Log::error('Unexpected response structure from LLM', ['response' => $botResponse]);
        return response()->json(['error' => 'Unexpected response structure from LLM'], 500);
    }
}
}
