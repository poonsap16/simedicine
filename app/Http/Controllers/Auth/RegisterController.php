<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Log;
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
    protected $wajaApi;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->wajaApi = new \App\APIs\WajaUserProvider();
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(\Illuminate\Http\Request $request)
    {
        // return redirect()->back()->withInput();
        // $response = $this->wajaApi->register($request->all());
        // return $response;
        // $response = [
        //     'reply_code' => 0,
        //     'username' => 'n.ngnapat',
        //     'line_qrcode_url' => 'http://cdnqrcgde.s3-eu-west-1.amazonaws.com/wp-content/uploads/2013/11/jpeg.jpg',
        //     'line_verify_code' => 123456
        // ];
        // if ( !$response ) {
        //     return redirect()->back()->withInput()->with('status', 'Service error please try again later.');
        // }

            switch ($request->username) {
                case 1:
                    $text = "<b><i>PASSWORD</i> AND <i>PASSWORD AGAIN</i> NOT MATCH</b>";
                    break;
                case 2:
                    $text = "<b><i>The ID <u>" . $request->input('ref_id') . "</u> is already taken. If you think it was wrong please contact Nalinee. YES, THE NALINEE.</i></b>";
                    break;
                case 3:
                    $text = "<b><i>The ID <u>" . $request->input('ref_id') . "</u> is not invited. If you want to join please contact Nongnapat.</i></b>";
                    break;
                case 4:
                    $text = "<b>External connection error</b>";
                    break;
                case 5:
                    $text = "<b>Internal service error</b>";
                    break;
                default:
                    $text = "<b>Please try again later</b>";
                    break;
            }
            return redirect()->back()->withInput()->with('status', $text);

        return redirect()->back()->with('line', $response);
    }

    public function checkLINEVerify(\Illuminate\Http\Request  $request)
    {
        return $this->wajaApi->checkLINEVerify($request->username);
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
