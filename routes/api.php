<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('baseline', function(Request $request){

    $email = base64_decode($request->token);
    $user = DB::table('wp_users')
        ->where('user_email', $email)
        ->first('id');
    DB::table('pt_results')
        ->updateOrInsert(
            ['user_id' => $user->id],
            ['baseline' => implode('#', $request->result)]
        );
        
    return response()->json([
        'payload' => url("{$request->local}/output/baseline?token={$request->token}")
    ]);
});

Route::post('ncode', function(Request $request){

    $email = base64_decode($request->token);
    $user = DB::table('wp_users')
        ->where('user_email', $email)
        ->first('id');
    DB::table('pt_results')
        ->updateOrInsert(
            ['user_id' => $user->id],
            ['ncode' => implode('#', $request->result)]
        );
        
    return response()->json([
        'payload' => url("{$request->local}/output/ncode?token={$request->token}")
    ]);
});