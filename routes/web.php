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

Route::post('/check-line-verify', 'Auth\RegisterController@checkLINEVerify');

Route::post('/query-sap-id','UserController@querySapId');

$router->get('logs', 'SecuredLogViewerController@index');
