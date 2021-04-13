<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//
class AdminLoginController extends Controller
{
    public function __cunstruct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $isAdmin = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
        if ($isAdmin) {
            return redirect()->intended(route('admin.index'));
        }

        return redirect()->back()->withInput();
    }

    public function logout()
    {
        Auth::logoutUsingId(1);
        return redirect('/');
    }
}
