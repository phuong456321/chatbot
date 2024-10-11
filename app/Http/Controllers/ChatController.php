<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function sendChat(Request $request){
        $userMessage = $request->input('input');
    
        // Initialize $result with a default response
        $result = 'I am sorry, I do not understand. Please ask me something else.';

        $responses = [
            'hello' => 'Hi! How can I help you today?',
            'how are you?' => 'I am fine, thank you! How about you?',
            'what is your name?' => 'I am Chatbot, how can I help you today?',
            'i love you' => 'I love you too!',
            'i hate you' => 'I am sorry to hear that!',
            'bye' => 'Goodbye! Have a great day!',
        ];
        foreach($responses as $key => $reply){
            if(stripos($userMessage, $key) !== false){
                $result = $reply;
                break;
            }
        }
        Log::info($result);
        return response()->json($result);
    }

}
