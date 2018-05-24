<?php

namespace App\APIs;

use GuzzleHttp\Client;

use Log;

class WajaUserProvider
{
    protected $api;

    public function __construct()
    {
        $this->api = new Client([
            'base_uri' => env('waja_host'),
            'headers'  => [
                'token'  => env('waja_token'),
                'secret' => env('waja_secret')
            ],
            'timeout'  => 2.0,
        ]);
    }

    public function checkField(Array $data)
    {
        $response = $this->api->post('/check-register-data', ['form_params' => $data]);
        if ( $response->getStatusCode() == 200 ) {
            return json_decode($response->getBody(), true);
        }

        return ['text' => 'request failed'];
    }

    public function register(Array $data)
    {
        $response = $this->api->post('/register', ['form_params' => $data]);
        if ( $response->getStatusCode() == 200 ) {
            return json_decode($response->getBody(), true);
        }

        return false;
    }

    public function checkLINEVerify($username)
    {
        
        $response = $this->api->post('/check-line-verify', [
            'form_params' => [
                'username' => $username
            ]
        ]);
        
        if ( $response->getStatusCode() == 200 ) {
            return json_decode($response->getBody(), true);
        }

        return false;   
    }
    public function addUser(Array $data)
    {
        $response = $this->api->post('/add-user', ['form_params' => $data]);
        if ( $response->getStatusCode() == 200 ) {
            return json_decode($response->getBody(), true);
        }

        return false;
    }
    // send email and user to waja 
    public function sendEmailVerify(Array $data){
        $response = $this->api->post('/send-email-verify', ['form_params' => $data]);
        if ( $response->getStatusCode() == 200 ) {
            return json_decode($response->getBody(), true);
        }

        return false;
    }
    //check email verify code 
    public function checkEmailVerify(Array $data){
        $response = $this->api->post('/check-email-verify', ['form_params' => $data]);
        if ( $response->getStatusCode() == 200 ) {
            return json_decode($response->getBody(), true);
        }

        return false;
    }
    public function changeEmail(Array $data){
        $response = $this->api->post('/change-email', ['form_params' => $data]);
        if ( $response->getStatusCode() == 200 ) {
            return json_decode($response->getBody(), true);
        }

        return false;
    }

    public function sendLineVerify(Array $data){
        $response = $this->api->post('/send-line-verify', ['form_params' => $data]);
        if ( $response->getStatusCode() == 200 ) {
            return json_decode($response->getBody(), true);
        }

        return false;
    }
}
