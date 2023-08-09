<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class IsExistResult
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $tool)
    {
        $email = base64_decode($request->token);
        $user = DB::table('wp_users')
            ->where('user_email', $email)
            ->first();

        $results = DB::table('pt_results')
            ->where('user_id', $user->ID)
            ->select($tool)->first();

        $local = explode('/', request()->path())[0];

        if ((!$results || !$results->$tool))
            return redirect("{$local}/commons/notFound");

        if ($tool == 'personal') {
            $request->session()->put("output-personal", $results->$tool);
        } else {
            $request->session()->put("output-$tool", explode('#', $results->$tool));
        }
        return $next($request);
    }
}
