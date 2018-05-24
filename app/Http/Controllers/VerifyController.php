<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class VerifyController extends Controller
{
    protected $wajaApi;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->wajaApi = new \App\APIs\WajaUserProvider();
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function sendEmailVerify(Request $request){
        $user = Auth::user();
        $data = ['id' => $user->id,
                 'email' => $user->email,
                 'username' => $user->name,
                 'type' => $request->type ];
        $response = $this->wajaApi->sendEmailVerify($data);
        return $response;
    }

    public function emailVerifyCode(Request $request)
    {
        $user = Auth::user();
        $data = [ 'id' => $user->id,
                  'verify_code' => $request->verify_code];
        $response = $this->wajaApi->checkEmailVerify($data);
        return $response;
    }
    public function sendLineVerify(Request $request){
        $user = Auth::user();
        $data = ['id' => $user->id,
                 'email' => $user->email,
                 'username' => $user->name,
                 'type' => $request->type ];
        $response = $this->wajaApi->sendLineVerify($data);
        return $response;
    }
}
