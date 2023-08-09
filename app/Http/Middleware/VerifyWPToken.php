<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class VerifyWPToken
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
        $email = base64_decode($request->token);
        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->first();

        if (empty($user)) return redirect()->back();

        return $next($request);
    }
}
