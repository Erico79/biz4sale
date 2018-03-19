<?php

namespace App\Http\Middleware;

use Closure;

class CheckPhoneVerification
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
        $user = $request->user();

        if ($user->phone_verified)
            return $next($request);
        else
            return redirect('phone-verification');
    }
}
