<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class UserController extends Controller
{
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
            return $data;
        }
    }
}