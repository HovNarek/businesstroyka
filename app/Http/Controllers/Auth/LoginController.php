<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'userLogout']);

        $this->username = $this->findUsername();
    }

    public function findUsername() {
        $login = request()->input('email_or_login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'login';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        $user = Socialite::driver('google')->user();

        $this->registerOrLoginUser($user);

        return redirect()->route('home');
    }

    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {
        $user = Socialite::driver('facebook')->user();

        $this->registerOrLoginUser($user);

        return redirect()->route('home');
    }

    public function redirectToVk() {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function handleVkCallback() {
        $user = Socialite::driver('vkontakte')->user();

        $this->registerOrLoginUser($user);

        return redirect()->route('home');
    }

    public function redirectToOk() {
        return Socialite::driver('odnoklassniki')->redirect();
    }

    public function handleOkCallback() {
        $user = Socialite::driver('odnoklassniki')->user();

        $this->registerOrLoginUser($user);

        return redirect()->route('home');
    }

    public function registerOrLoginUser($data) {
        if ($data->email) {
            $user = User::where('email', $data->email)->first();
            if (!$user) {
                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->provider_id = $data->id;
                $user->avatar = $data->avatar;
                $user->save();
            }

            Auth::login($user);
        }
    }
}
