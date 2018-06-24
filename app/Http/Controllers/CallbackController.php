<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Callback;

class CallbackController extends Controller
{
    public function getMessage (Request $request){
        $message = new Callback;
        
        $message->username = $request->username;
        $message->text = $request->text;
        $message->reply_token  = $request->reply_token;
        $message->save();
        return $response = ['reply_code' => 0 ,
                            'reply_text' => 'OK'];

    }
}
