<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        $user = User::whereHas('roles', function($query) {
            $query->where('roles.id', '>=', 1)->where('roles.id', '<=', 3);
        })
            ->find(Auth::user()->id);
        if ($user) {
            return $next($request);
        }
        return redirect()->back();
    }
}
