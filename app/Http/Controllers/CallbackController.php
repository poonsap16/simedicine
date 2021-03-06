<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Callback;

use Illuminate\Support\Facades\Auth;

class CallbackController extends Controller
{
    public function getMessage (Request $request){
        if ($request->header('token') == env('ACCESS_TOKEN') && $request->header('secret') == env('ACCESS_SECRET')){
            $message = new Callback;
        
            $message->username = $request->username;
            $message->text = $request->text;
            $message->reply_token  = $request->reply_token;
            $message->save();
            return $response = ['reply_code' => 0 ,
                                'reply_text' => 'OK'];
        }else{
            return $response = ['reply_code' => 1 ,
                                'reply_text' => 'Do not accept.'];
        }
    }
    public function showMessage(){
        $user =  Auth::user();
        if ($user['ref_id'] != 10032608){
            return "ไม่มีสิทธิ์";
        }else{
            $messages = Callback::all();
            return $messages;
        }
    }
}
