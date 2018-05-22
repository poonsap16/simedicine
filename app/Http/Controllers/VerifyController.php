<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $response = $this->wajaApi->sendEmailVerify($request->all());
        return $response;
    }

    public function emailVerifyCode(Request $request)
    {
        $response = $this->wajaApi->checkEmailVerify($request->all());
        return $response;
        if( $request->verify_code == 123456){
            return $response = [ 'reply_code' => 0 ,
                                 'reply_text' => 'code is correctly'];
        }else {
            return $response = [ 'reply_code' => 1 ,
                                 'reply_text' => 'code not match'];
        }
    }
}
