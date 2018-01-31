<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class UserController extends Controller
{
    public function querySapId(Request $request){
       
        $client = new Client([
            'base_uri' => 'http://localhost:9002/', // base URL
            'timeout'  => 8.0, // you better set timeout greater than 5 seconds
        ]);
        $response = $client->post('/query-sap-id', [
            'headers' => [
                'Accept' => 'application/json',
                'access_token'  => env('ACCESS_TOKEN'), // Your apps token
                'access_secret' => env('ACCESS_SECRET') // Your apps secret
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