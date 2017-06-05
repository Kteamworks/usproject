<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use App\User;
use Auth;
use DateTime;
use DB;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    // if auth is user
    protected $redirectAfterLogout = '/';
    protected $loginPath = '/login';

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => ['logout', 'logout']]);
    }
	    /**
     * Get login page.
     *
     * @return type Response
     */
    public function getLogin()
    {
            if (Auth::user()) {
   //             if (Auth::user()->role == 'admin' || Auth::user()->role == 'agent') {
     //               return \Redirect::route('dashboard');
       //         } elseif (Auth::user()->role == 'user') {
         //           return \Redirect::route('home');
           //     }
            } else {
                return view('auth.login');
            }
    }
            
	
    /**
     * Post of login page.
     *
     * @param type LoginRequest $request
     *
     * @return type Response
     */
    public function postLogin(LoginRequest $request)
    {
        // dd($request->input());
        //\Event::fire('auth.login.event', []); //added 5/5/2016
        // Set login attempts and login time
        $value = $_SERVER['REMOTE_ADDR'];
        $usernameinput = $request->input('email');
        $password = $request->input('password');
        $field = filter_var($usernameinput, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        $check_active = User::where('email', '=', $request->input('email'))->orwhere('user_name', '=', $request->input('email'))->first();
        if (!$check_active) { //check if user exists or not
            //if user deos not exist then return back with error that user is not registered
            return redirect()->back()
                            ->withInput($request->only('email', 'remember'))
                            ->withErrors([
                                'email'                     => 'This field doesnot match our records',
                                'password'                  => 'This field doesnot match our records',
                            ])->with(['error'               => 'Not Registered']);
        }
            // setting is disabled
            a: if (!$check_active->active) { //check account is active or not
                // if accoutn is not active return back with error message that account is inactive
                return redirect()->back()
                                ->withInput($request->only('email', 'remember'))
                                ->withErrors([
                                    'email'       => 'This field doesnot match our records',
                                    'password'    => 'This field doesnot match our records',
                                ])->with(['error' => 'This_account_is_currently_inactive']);
            } else {
                // try login
                    $usernameinput = $request->input('email');
                    $password = $request->input('password');
                    $field = filter_var($usernameinput, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

                if (Auth::Attempt([$field => $usernameinput, 'password' => $password], $request->has('remember'))) {
                    if (Auth::user()->role == 'user') {
                        
                        return \Redirect::route('/');
                    } else {
                        return redirect()->intended($this->redirectPath());
                    }
                }
            }
        

        return redirect()->back()
                        ->withInput($request->only('email', 'remember'))
                        ->withErrors([
                            'email'       => 'Invalid username, Please try again',
                            'password'    => 'Invalid password, Please try again',
                        ])->with(['error' => 'Invalid Credentials' ]);
        // Increment login attempts
    }

}
