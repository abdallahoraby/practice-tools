<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class CanJoin
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

        $pt_data = json_decode($user->pt_data);

        $local = explode('/', request()->path())[0];
        View::share('local', explode('/', request()->path())[0]);

        if ($tool == "ncode") {

            Cache::rememberForever($request->token, fn () => [
                0 => $pt_data->ncode_1,
                1 => $pt_data->ncode_2,
                2 => $pt_data->ncode_3,
                3 => $pt_data->ncode_4,
            ]);

            if (
                $pt_data->ncode_1 || $pt_data->ncode_2 ||
                $pt_data->ncode_3 || $pt_data->ncode_4
            ) {
                $results = DB::table('pt_results')
                    ->where('user_id', $user->ID)
                    ->select($tool)->first();

                return ((!$results || !$results->$tool))
                    ? $next($request)
                    : redirect("{$local}/output/{$tool}?token={$request->token}");
            }

            return redirect()->back();
        }

        if ($pt_data->$tool) {
            $results = DB::table('pt_results')
                ->where('user_id', $user->ID)
                ->select($tool)->first();

            return ((!$results || !$results->$tool))
                ? $next($request)
                : redirect("{$local}/output/{$tool}?token={$request->token}");
        }

        return redirect()->back();
    }
}
