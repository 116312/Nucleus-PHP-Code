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


//************************** Workout  Categories ********************************************* //

    Route::get('add-cate','CategoryController@add');
    Route::post('store-cate','CategoryController@store');
    Route::get('show-cate','CategoryController@show');
    Route::get('edit-cate/{id}','CategoryController@edit');
    Route::post('update-cate/{id}','CategoryController@update');
    Route::post('delete-cate/{id}','CategoryController@delete');


// *********************** Challenge Catgeory ***********************************************//

    
    Route::get('add-chall-cate','ChallengeCategoryController@add');
    Route::post('store-chall-cate','ChallengeCategoryController@store');
    Route::get('show-chall-cate','ChallengeCategoryController@show');
    Route::get('edit-chall-cate/{id}','ChallengeCategoryController@edit');
    Route::post('update-chall-cate/{id}','ChallengeCategoryController@update');
    Route::post('delete-chall-cate/{id}','ChallengeCategoryController@delete');


//************************************ Nucleus Challenges **************************************//


    Route::get('add-nuc-chall','NucleusChallengeController@add');
    Route::post('store-nuc-chall','NucleusChallengeController@store');
    Route::get('show-nuc-chall','NucleusChallengeController@show');
    Route::get('edit-nuc-chall/{id}','NucleusChallengeController@edit');
    Route::post('update-nuc-chall/{id}','NucleusChallengeController@update');
    Route::post('delete-nuc-chall/{id}','NucleusChallengeController@delete'); 



//****************************** Promotional Categories ********************************//

    Route::get('add-promo_cate','PromotionalCategoryController@add');
    Route::post('store-promo_cate','PromotionalCategoryController@store');
    Route::get('show-promo_cate','PromotionalCategoryController@show');
    Route::get('edit-promo_cate/{id}','PromotionalCategoryController@edit');
    Route::post('update-promo_cate/{id}','PromotionalCategoryController@update');
    Route::post('delete-promo_cate/{id}','PromotionalCategoryController@delete');
   

});








Route::group(['prefix' => 'api-details'],function (){

    Route::get('/', function () {

        return view('apidetails');
    });
  Route::get('register-form','ApiDetailController@registerForm');
  Route::get('login-form','ApiDetailController@loginForm');
  Route::get('social-login-form','ApiDetailController@socialLoginForm');
  Route::get('get-all-categories-form','ApiDetailController@getcategoryForm');
 

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
