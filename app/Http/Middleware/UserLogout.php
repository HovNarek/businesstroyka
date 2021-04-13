<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::find(Auth::guard('web')->user()->id);
        if ($user->is_logout) {
            Auth::guard('web')->logout();
            $user->is_logout = false;
            $user->save();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
