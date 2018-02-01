<?php

namespace App\APIs;

use GuzzleHttp\Client;

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
}
