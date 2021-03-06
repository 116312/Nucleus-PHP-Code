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

Route::middleware('auth:api')->get('/user',function (Request $request)
{
    return $request->user();
});


Route::group(['namespace' => 'Api'],function (){

   Route::post('register-user','UserController@register');
   Route::post('sendEmailForSignUp','UserController@sendEmailForSignUp');
   Route::post('login-user','UserController@login');
   Route::post('getAllusers','UserController@getAllusers');
   Route::post('social-login','UserController@socialLogin');
   Route::post('update-profile','UserController@updateprofile');
   Route::post('get-user-profile','UserController@getprofile');
   Route::post('forgot-password','UserController@forgotPassword');
   Route::post('reset-password','UserController@resetPassword');
   Route::post('submit-social-privacy-setting','UserController@submitsocialprivacysettings');
   Route::post('get-social-privacy-setting','UserController@getuserssocialprivacysetting');

//********************** Categories Api *******************************//

Route::post('get-all-categories','CategoryController@getallcatgory');
Route::post('get-all-categories-except-all-workout','CategoryController@getallcatgoryexceptallworkout');

//***************************** Workouts **********************************************//

Route::post('get-workout-by-category','WorkoutController@getworkoutbycategory');

//************************** Challenges Api ***********************//

Route::post('get-all-nucleus-challenges','NucleusChallengeController@getallchallenges'); 
Route::post('user-select-challenge','NucleusChallengeController@userselectchallenge');
Route::post('get-user-challenge','NucleusChallengeController@getuserchallenge');



//********************************** Promotions Api *******************//

Route::get('get-all-promotions','PromotionalManagementController@getallpromotions'); 
Route::get('check-video','PromotionalManagementController@checkvideo');


//******************************** Training and Plan *******************************//
 
Route::post('submit-user-training-plan','TrainingAndPlanController@submit');
Route::post('get-user-traing-and-plan','TrainingAndPlanController@getTrainingPlan');



//**************************** Subscription Plan *******************************//

Route::post('get-subscription-plan','SubscriptionPlanController@getSubscriptionPlan');

//*************************** Favorite Video***********************************************//
Route::post('add-favorite-video','FavoriteVideoController@addFavoriteVideo');
Route::post('get-favorite-video','FavoriteVideoController@getFavoriteVideo');

//**************************** Subscription Plan *******************************//

Route::post('get-privacy-policy','PrivacyPolicyController@getPrivacyPolicy');

//*********************** User Subscription Details ********************//

Route::post('submit-user-subscription','UserSubscriptionDetailsController@saveDetails');
Route::post('getUserSubscriptionDetail','UserSubscriptionDetailsController@getUserSubscriptionDetail');
Route::post('cancelSubscriptionPlan','UserSubscriptionDetailsController@cancelSubscriptionPlan');
Route::get('expireSubscription','UserSubscriptionDetailsController@expireSubscription');
Route::post('GetSubscriptionReceipt','UserSubscriptionDetailsController@GetSubscriptionReceipt');
Route::post('feedback','FeedbackController@feedback');

//*****************************Video Tracking****************************//

Route::post('video-view','VideoTrackController@view');

});
