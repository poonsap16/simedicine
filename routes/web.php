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
Route::get('/add-users','UserController@addUsersForm');
Route::post('/add-user', ['as' => 'add-user', 'uses' => 'Auth\RegisterController@addUser']);

$router->get('logs', 'SecuredLogViewerController@index');

Route::post('/validate', ['as' => 'register', 'uses' => 'Auth\RegisterController@validateData']);

//Login for admin
Route::get('/login',['as'=>'login','uses'=>'Auth\LoginController@showLoginForm']);
Route::post('/login', 'Auth\LoginController@authenticate');

Route::get('/profile','UserController@profile');

Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});