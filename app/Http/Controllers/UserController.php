<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    protected $wajaApi;

    public function __construct()
    {
        $this->wajaApi = new \App\APIs\WajaUserProvider();
        $this->middleware('auth')->except('querySapId','addUsersForm');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function querySapId(Request $request){
       
        // return [
        //     "name" => "น.ส. นงนภัส สำแดงเดช",
        //     "email" => "n.ng",
        //     "org_id" => "10032608",
        //     "tel_no" => "",
        //     "active" => 1,
        //     "name_en" => "NONGNAPAT SOMDANGDECH",
        //     "reply_code" => 0,
        //     "reply_text" => "OK",
        //     "document_id" => "1100800997121",
        //     "org_division_id" => "50000144",
        //     "org_position_id" => "70000079",
        //     "org_division_name" => "สนง.ภาควิชาอายุรศาสตร์",
        //     "org_position_title" => "นักวิชาการคอมพิวเตอร์"
        // ];
        $client = new Client([
            'base_uri' => env('waja_host'), // base URL
            'timeout'  => 8.0, // you better set timeout greater than 5 seconds
        ]);
        $response = $client->post('/query-sap-id', [
            'headers' => [
                'Accept' => 'application/json',
                'token'  => env('waja_token'), // Your apps token
                'secret' => env('waja_secret') // Your apps secret
            ],
            'form_params' => [
                'function' => 'querySapId',  // in this example we will call user function
                'sap_id'   => $request->sap_id // use 'org_id' as a key
            ]
        ]);

        if ( $response->getStatusCode() == 200 ) {
            $data = json_decode($response->getBody(), true);
            // if ($data['document_id'] != $request->document_id){
            //     $data = 0;
            //     return $data;
            // }
            return $data;
        }
    }
    public function profile(){
        $user =  Auth::user();
        $data = ['id' => $user->id,
                 'username' => $user->name];
        $response = $this->wajaApi->checkEmailLineVerify($data);    
        return view('profile')->with('response',$response);

    }
    public function changeEmail(Request $request){
        $user = Auth::user();
        $data = $request->all() + ['user_id'=> $user->id];
        $response = $this->wajaApi->changeEmail($data);
        return $response;
    }
}