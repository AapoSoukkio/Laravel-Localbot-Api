<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocalbotController extends Controller
{
    public function sendMessage(Request $request)
    {
        //TODO: This kind of works but there is a need for proper solution
        $userMessage = $request->input('message');
        $containerId = ''; 
        $command = escapeshellcmd("docker exec $containerId /bin/ollama run llama2 ' $userMessage '");
        $output = [];
        $resultCode = 0;

        exec($command, $output, $resultCode);

        $botResponse = implode("\n", $output);

        return response()->json(['message' => $botResponse]);
    }
}
