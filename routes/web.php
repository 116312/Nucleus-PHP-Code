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




//************************* Workout Type *****************************************//
  
  Route::get('add-workout-type','WorkoutTypeController@add');
  Route::post('store-workout-type','WorkoutTypeController@store');
  Route::get('show-workout-type','WorkoutTypeController@show');
  Route::get('edit-workout-type/{id}','WorkoutTypeController@edit');
  Route::post('update-workout-type/{id}','WorkoutTypeController@update');
  Route::post('delete-workout-type/{id}','WorkoutTypeController@delete');    

//************************ Workout Level *******************************************?//
  
  Route::get('add-workout-level','WorkoutLevelController@add');
  Route::post('store-workout-level','WorkoutLevelController@store');
  Route::get('show-workout-level','WorkoutLevelController@show');
  Route::get('edit-workout-level/{id}','WorkoutLevelController@edit');
  Route::post('update-workout-level/{id}','WorkoutLevelController@update');
  Route::post('delete-workout-level/{id}','WorkoutLevelController@delete'); 



//************************************** Language ************************************************//


   Route::get('add-language','LanguageController@add');
   Route::post('store-language','LanguageController@store');
   Route::get('show-language','LanguageController@show');
   Route::get('edit-language/{id}','LanguageController@edit');
   Route::post('update-language/{id}','LanguageController@update');
   Route::post('delete-language/{id}','LanguageController@delete'); 



//********************************** GIF *********************************************************//
    


   Route::post('store-gif','GifController@store');
   Route::get('show-gif','GifController@show');
   Route::get('edit-gif/{id}','GifController@edit');
   Route::post('update-gif/{id}','GifController@update');
   Route::post('delete-gif/{id}','GifController@delete');



//****************************** Premium Videos *************************************************//
  Route::get('add-premium-videos','PremiumVideosController@add');
   Route::post('store-premium-videos','PremiumVideosController@store');
   Route::get('show-premium-videos','PremiumVideosController@show');
   Route::get('edit-premium-videos/{id}','PremiumVideosController@edit');
   Route::post('update-premium-videos/{id}','PremiumVideosController@update');
   Route::post('delete-premium-videos/{id}','PremiumVideosController@delete');


   Route::get('add-gif','GifController@add');




//************************************** Voice Guidance Type ************************************//

   Route::get('add-voice-guidance-type','VoiceGuidanceTypeController@add');
   Route::post('store-voice-guidance-type','VoiceGuidanceTypeController@store');
   Route::get('show-voice-guidance-type','VoiceGuidanceTypeController@show');
   Route::get('edit-voice-guidance-type/{id}','VoiceGuidanceTypeController@edit');
   Route::post('update-voice-guidance-type/{id}','VoiceGuidanceTypeController@update');
   Route::post('delete-voice-guidance-type/{id}','VoiceGuidanceTypeController@delete'); 




//***************************** Workout Details ******************************************//

  Route::get('add-workout-details','WorkoutDetailsController@add');
  Route::post('store-workout-details','WorkoutDetailsController@store');
  Route::get('show-workout-details','WorkoutDetailsController@show');
  Route::get('edit-workout-details/{id}','WorkoutDetailsController@edit');
  Route::post('update-workout-details/{id}','WorkoutDetailsController@update');
  Route::post('delete-workout-details/{id}','WorkoutDetailsController@delete'); 


// *********************** Challenge Catgeory ***********************************************//

    
    Route::get('add-chall-cate','ChallengeCategoryController@add');
    Route::post('store-chall-cate','ChallengeCategoryController@store');
    Route::get('show-chall-cate','ChallengeCategoryController@show');
    Route::get('edit-chall-cate/{id}','ChallengeCategoryController@edit');
    Route::post('update-chall-cate/{id}','ChallengeCategoryController@update');
    Route::post('delete-chall-cate/{id}','ChallengeCategoryController@delete');


//************************************ Nucleus Challenges**************************************//


    Route::get('add-nuc-chall','NucleusChallengeController@add');
    Route::post('store-nuc-chall','NucleusChallengeController@store');
    Route::get('show-nuc-chall','NucleusChallengeController@show');
    Route::get('edit-nuc-chall/{id}','NucleusChallengeController@edit');
    Route::post('update-nuc-chall/{id}','NucleusChallengeController@update');
    Route::post('delete-nuc-chall/{id}','NucleusChallengeController@delete'); 



//*************************** Promotional Managemant ***************************************//

    Route::get('add-promo_cate','PromotionManagementController@addCategory');
    Route::post('store-promo','PromotionManagementController@store');
    Route::get('show-promo_cate','PromotionManagementController@showCategory'); 
    Route::get('edit-promo_cate/{id}','PromotionManagementController@editCategory');
    Route::post('update-promo/{id}','PromotionManagementController@update');



    Route::get('add-promo_chall','PromotionManagementController@addChallenge');
    Route::get('show-promo_chall','PromotionManagementController@showChallenge');
    Route::get('edit-promo_chall/{id}','PromotionManagementController@editChallenge');
    Route::post('delete-promo/{id}','PromotionManagementController@delete');




    Route::get('add-promo_video','PromotionManagementController@addVideo');
    Route::get('show-promo_video','PromotionManagementController@showVideo');
    Route::get('edit-promo_video/{id}','PromotionManagementController@editVideo');   



//****************************** Promotional Categories ********************************//

    // Route::get('add-promo_cate','PromotionalCategoryController@add');
    // Route::post('store-promo_cate','PromotionalCategoryController@store');
    // Route::get('show-promo_cate','PromotionalCategoryController@show');
    // Route::get('edit-promo_cate/{id}','PromotionalCategoryController@edit');
    // Route::post('update-promo_cate/{id}','PromotionalCategoryController@update');
    // Route::post('delete-promo_cate/{id}','PromotionalCategoryController@delete');
   

});








Route::group(['prefix' => 'api-details'],function (){

    Route::get('/', function () {

        return view('apidetails');
    });
  Route::get('register-form','ApiDetailController@registerForm');
  Route::get('login-form','ApiDetailController@loginForm');
  Route::get('social-login-form','ApiDetailController@socialLoginForm');
  Route::get('get-all-categories-form','ApiDetailController@getcategoryForm');
  Route::get('get-categories-form','ApiDetailController@getcategoryexceptallworkout');
  Route::get('edit-profile-form','ApiDetailController@geteditForm');
  Route::get('get-profile-form','ApiDetailController@getprofileForm');
  Route::get('forgot-password-form','ApiDetailController@getforgotpasswordForm');
  Route::get('reset-password-form','ApiDetailController@getresetpasswordForm');
 

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
