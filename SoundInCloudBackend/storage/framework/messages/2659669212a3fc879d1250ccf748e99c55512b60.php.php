<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role != User::$ROLE_ADMIN) {
            return redirect('/home');
        }

        Log::notice('Admin logged in: '. Auth::user(). ' at '. Carbon::now()->toDayDateTimeString());
        return $next($request);
    }
}
