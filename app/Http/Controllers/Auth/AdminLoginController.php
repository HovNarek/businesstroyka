<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//
class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    protected $username;

    public function __cunstruct()
    {
        $this->middleware('guest')->except('logout');

        $this->username = $this->findUsername();
        dd($this->username);
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

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
