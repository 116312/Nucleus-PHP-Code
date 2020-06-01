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
   Route::post('update-profile','UserController@updateprofile');
   Route::post('get-user-profile','UserController@getprofile');
   Route::post('forgot-password','UserController@forgotPassword');
   Route::post('reset-password','UserController@resetPassword');





//********************** Categories Api *******************************//

Route::post('get-all-categories','CategoryController@getallcatgory');
Route::post('get-all-categories-except-all-workout','CategoryController@getallcatgoryexceptallworkout');

//***************************** Workouts **********************************************//

Route::post('get-workout-by-category','WorkoutController@getworkoutbycategory');

//************************** Challenges Api ***********************//

Route::get('get-all-nucleus-challenges','NucleusChallengeController@getallchallenges'); 
Route::post('user-select-challenge','NucleusChallengeController@userselectchallenge');



//********************************** Promotions Api *******************//

Route::get('get-all-promotions','PromotionalManagementController@getallpromotions'); 


Route::get('check-video','PromotionalManagementController@checkvideo');

});
