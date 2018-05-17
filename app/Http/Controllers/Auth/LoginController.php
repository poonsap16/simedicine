<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use GuzzleHttp\Client;
use Log;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function authenticate(Request $request)
    {
        $client = new Client([
            'base_uri' => env('waja_host'), // base URL
            'timeout'  => 8.0, // you better set timeout greater than 5 seconds
        ]);
        $response = $client->post('/authenticate', [
            'headers' => [
                'Accept' => 'application/json',
                'token'  => env('waja_token'), // Your apps token
                'secret' => env('waja_secret')
            ],
            'form_params' => [
                'org_id'=> $request->ref_id,
                'password'=> $request->password
            ]
        ]);
        
        $user = json_decode($response->getBody(), true);
        // // ***
        // Log::info('waja response => ' . json_encode($user));
        // // ***
        if ( $user['reply_code'] != 0 ) {
            switch ($user['reply_code']) {
                case 1:
                    $text = "Incomplete request";
                    break;
                case 3:
                    $text = "Wrong password";
                    break;
                case 5:
                    $text = "Account not verify";
                    break;
                case 6:
                    $text = "Account not found";
                    break;
                case 8:
                    $text = "You have attempted to log in too many times, please wait 5 minutes before continue";
                    break;
                case 9:
                    $text = "Please try to login again.";
                    break;
                default:
                    $text = "Please try to login again.";
                    break;
            }
            return redirect()->back()->withInput()->with('status', $text);
        }
        if( User::find($user['id']) == null){
            $new_user = new User;
            $new_user->id = $user['id'];
            $new_user->name = $user['name'];
            $new_user->ref_id = $user['ref_id'];
            $new_user->email = $user['email'];
            $new_user->full_name = $user['full_name'];
            $new_user->gender = $user['gender'];
            $new_user->save();
            
            // // ***
            // Log::info('new user => ' . json_encode($new_user));
            // // ***
        }
        
        // Auth::loginUsingId($user['id']);
        // ***
        Auth::loginUsingId($user['id'], false);
        // Log::info('user already exists => ' . json_encode(Auth::user()));
        return $this->sendLoginResponse($request);
        // ***
                // return redirect()->intended('/consults/create'); // เปลี่ยนเองนะ
    }
    
    // ***
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }
    
    protected function authenticated(Request $request, $user)
    {
    }
    
    protected function guard()
    {
        return Auth::guard();
    }
    // ***
}