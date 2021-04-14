<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LastUserActivityMiddleware
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
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(2);
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
            User::where('id', Auth::user()->id)
                ->update(['last_activity' => Carbon::now()->format('Y-m-d H:i:s')]);
        }
        return $next($request);
    }
}
