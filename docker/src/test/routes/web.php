<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


/*
Route::get('/', function () {
  return view('Top');
});
*/
Route::view('/', 'Top');


/* vendor/laravel/ui/src/AuthRouteMethods.php参照 */
/*
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('password/confirm', 'Auth\ConfirmPasswordController@confirm')->name('password.confirm');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
*/

/* ログイン時のみ遷移 */
Route::group(['middleware' => 'auth'], function() {
    Route::get('/main', 'MainController@index')->name('main');
    // Route::get('/main', 'MainController@get');
});

/* 認証 */
Auth::routes();

Route::get('/Top', 'HomeController@index')->name('Top');
// Route::get('/home', 'HomeController@index')->name('home');
