<?php

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

/**Using built in routes, but we want to limit the registration
 * and password reset functionality
 * so we remove the rest of the auth routes**/

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::post('login','Auth\LoginController@login');

Route::post('logout','Auth\LoginController@logout');

Route::get('dashboard', 'DashboardController@index');

Route::get('home','DashboardController@index');

Route::get('users','UserController@index');

Route::get('attendance','AttendanceController@attendance');

Route::post('arrive', 'AttendanceController@arrive');

Route::post('depart','AttendanceController@depart');

Route::post('register','Auth\RegisterController@register');


