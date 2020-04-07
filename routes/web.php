<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');


Route::group(['namespace' => 'Admin','prefix' => 'admin'],function (){

    Route::get('dashboard','DashboardController@dashboard');
    Route::get('all-users','UserController@allUsers');
   

});








Route::group(['prefix' => 'api-details'],function (){

    Route::get('/', function () {

        return view('apidetails');
    });
  Route::get('register-form','ApiDetailController@registerForm');
  Route::get('login-form','ApiDetailController@loginForm');
  Route::get('social-login-form','ApiDetailController@socialLoginForm');
 

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
