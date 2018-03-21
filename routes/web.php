<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('register');
});

Route::get('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);

Route::post('/check-line-verify', ['as' => 'check-line-verify','uses'=> 'Auth\RegisterController@checkLINEVerify']);

Route::post('/query-sap-id','UserController@querySapId');

$router->get('logs', 'SecuredLogViewerController@index');


// test
Route::get('/test/{sap}', function ($sap) {
    $client = new  \GuzzleHttp\Client([
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
            'sap_id'   => $sap // use 'org_id' as a key
        ]
    ]);

    if ( $response->getStatusCode() == 200 ) {
        $data = json_decode($response->getBody(), true);
        return $data;
    }
});
