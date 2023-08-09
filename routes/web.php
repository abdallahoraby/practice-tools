<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getResources/{tool}', function ($tool) {
    return response()->json([
        'payload' => Cache::rememberForever("resources.{$tool}", fn () => config("resources.{$tool}")) // config("resources.{$tool}")
    ]);
});

Route::get('/opnedNcode/{token}', function ($token) {
    return response()->json([
        'payload' => Cache::get($token)
    ]);
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/getLang/{file}', function ($file) {
            return response()->json([
                'payload' => Cache::rememberForever(Lang::getLocale() . '_' . $file, fn () => Lang::get($file)) // Lang::get($file)
            ]);
        });


        Route::view('/', 'index');
        Route::view('/notactive', 'commons.notactive');
        Route::view('commons/notFound', 'commons.not-found');

        Route::middleware('verifyWPToken', 'isActivePT')->group(function () {
            Route::view('tool/index', 'tool.index');

            Route::view('start/personal', 'tool.start.personal');
            Route::view('start/wheel', 'tool.start.wheel');
            Route::view('start/baseline', 'tool.start.baseline');
            Route::view('start/decision', 'tool.start.decision');
            Route::view('start/define', 'tool.start.define');
            Route::view('start/ncode', 'tool.start.ncode');

            Route::view('tool/personal', 'tool.personal-assesment')->middleware('canJoin:personal');
            Route::view('tool/wheel', 'tool.wheel-of-life')->middleware('canJoin:wheel');
            Route::view('tool/baseline', 'tool.baseline')->middleware('canJoin:baseline');
            Route::view('tool/decision', 'tool.decision')->middleware('canJoin:decision');
            Route::view('tool/define', 'tool.define')->middleware('canJoin:define');
            Route::view('tool/ncode', 'tool.ncode')->middleware('canJoin:ncode');

            Route::view('output/baseline', 'tool.output.baseline')->middleware('isExistResult:baseline');
            Route::view('output/ncode', 'tool.output.ncode')->middleware('isExistResult:ncode');
            Route::view('output/define', 'tool.output.define')->middleware('isExistResult:define');
            Route::view('output/wheel', 'tool.output.wheel')->middleware('isExistResult:wheel');
            Route::view('output/personal', 'tool.output.personal')->middleware('isExistResult:personal');
            Route::view('output/personalFraim{res}', 'tool.output.personalFraim');
            Route::view('output/decision', 'tool.output.decision')->middleware('isExistResult:decision');
        });

        Route::middleware('verifyWPToken', 'isAdmin')->group(function () {

            Route::view('admin/index', 'admin.index');

            Route::get('admin/users-roles/{user_id}', function ($user_id) {
                return view('admin.users-roles', [
                    'user_id' => $user_id
                ]);
            });

            Route::view('output/baseline/{user_id}', 'tool.output.baseline')->middleware('isExistResultFor:baseline');
            Route::view('output/ncode/{user_id}', 'tool.output.ncode')->middleware('isExistResultFor:ncode');
            Route::view('output/define/{user_id}', 'tool.output.define')->middleware('isExistResultFor:define');
            Route::view('output/wheel/{user_id}', 'tool.output.wheel')->middleware('isExistResultFor:wheel');
            Route::view('output/personal/{user_id}', 'tool.output.personal')->middleware('isExistResultFor:personal');
            Route::view('output/decision/{user_id}', 'tool.output.decision')->middleware('isExistResultFor:decision');
        });
    }
);


Route::get('/{page}', 'ViewkernelController');
