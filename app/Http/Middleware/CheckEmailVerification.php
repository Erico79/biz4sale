<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmailVerification
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

        if ($user->email_verified)
            return $next($request);
        else
            return redirect('email-verification');
    }
}
