<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->api = new \App\APIs\WajaUserProvider();
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(\Illuminate\Http\Request $request)
    {
        // return env('waja_host');
        
        // return ['field' => 'password', 'value' => $request->input('password')];
        // return $this->api->checkField(['field' => 'password', 'value' => $request->input('password')]);
        $response = $this->api->register($request->all());

        if ( !$response ) {
            return redirect()->back()->withInput()->with('status', 'Service error please try again later.');
        }

        if ( $response['reply_code'] != 0 ) {
            switch ($response['reply_code']) {
                case 1:
                    $text = "<b><i>PASSWORD</i> AND <i>PASSWORD AGAIN</i> NOT MATCH</b>";
                    break;
                case 2:
                    $text = "<b><i>The ID <u>" . $request->input('ref_id') . "</u> is already taken. If you think it was wrong please contact Nalinee. YES, THE NALINEE.</i></b>";
                    break;
                case 3:
                    $text = "<b><i>The ID <u>" . $request->input('ref_id') . "</u> is not invited. If you want to join please contact Nongnapat.</i></b>";
                    break;
                default:
                    $text = "";
                    break;
            }
            return redirect()->back()->withInput()->with('status', $text);
        }

        return redirect()->back()->with('line', $response);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
