<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ip;
use App\Models\Admin\RoleUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
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
            $user_not_exist = !$user;
            if ($user_not_exist) {
                $user = new User();
                $user->name = $data->name;
                $user->email = $data->email;
                $user->provider_id = $data->id;
                $user->avatar = $data->avatar;
                $user->email_verified_at = Carbon::now()->format('Y-m-d h:i:s');
                $user->save();

                RoleUser::create([
                    'user_id' => $user->id,
                    'role_id' => 4
                ]);

                Ip::create([
                    'user_id' => $user->id,
                    'ip' => request()->ip()
                ]);
            }

            Auth::login($user);

            if (!$user_not_exist) {
                $user_id = Auth::user()->id;
                $ips = Ip::getIpsByUserId($user_id);
                if (count($ips) >= 1 && count($ips) <= 2) {
                    Ip::create([
                        'user_id' => $user_id,
                        'ip' => request()->ip()
                    ]);
                } elseif (count($ips) === 3) {
                    Ip::where('user_id', $user_id)
                        ->where('updated_at', $ips[1]->updated_at)
                        ->update([
                            'ip' => request()->ip()
                        ]);
                }
            }
        }
    }
}
