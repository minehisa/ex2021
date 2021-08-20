<?php

use Illuminate\Http\Request;
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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(["middleware" => "auth.api"], function () {
    // 論文表示
    // Route::get('/main/papers', 'API\PaperController@get_paper_vue');
    Route::get('/main/papers', 'API\PaperController@get_paper_bootstrap');
    // 論文削除
    Route::post('/main/delete', 'API\PaperController@delete');
});
