<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->email_verified_at == NULL) {
            Auth::logout();
            if (app()->getLocale() === 'en') {
                Session::flash('flash_message', 'Email is not verified yet.');
                Session::flash('flash_class', 'alert alert-danger');
                return redirect('/login');
            } else {
                Session::flash('flash_message', 'لم يتم التحقق من البريد الإلكتروني حتى الآن.');
                Session::flash('flash_class', 'alert alert-danger');
                return redirect('/login');
            }
        }
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();

        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('home');
        } else {
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt('12345678');
            $user->email_verified_at = Carbon::now();
            $user->save();

            Auth::login($user);

            return redirect()->route('home');
        }
    }


    /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback()
    {
        $userSocial = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('home');
        } else {
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt('12345678');
            $user->email_verified_at = Carbon::now();
            $user->save();

            Auth::login($user);

            return redirect()->route('home');
        }
    }

    // showAdminLoginForm
    public function showAdminLoginForm()
    {
        return view('auth.login');
    }

    // submitAdminLoginForm
    public function submitAdminLoginForm(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // showAcademicGuideLoginForm
    public function showAcademicGuideLoginForm()
{
    return view('academic');
}

public function submitAcademicGuideLoginForm(Request $request)
{
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        return redirect()->route('academicGuide.home');
    }
    
    return back()->withErrors(['email' => 'Invalid credentials']);
}
}
