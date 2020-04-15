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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();



});


Route::group(['namespace' => 'Api'],function (){

   Route::post('register-user','UserController@register');
   Route::post('login-user','UserController@login');
    Route::post('social-login','UserController@socialLogin');






//********************** Categories Api *******************************//

Route::post('get-all-categories','CategoryController@getallcatgory');



//************************** Challenges Api ***********************//

Route::get('get-all-nucleus-challenges','NucleusChallengeController@getallchallenges');  


});
