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

Route::get('terms_and_conditions','ScreensDataController@termsandconditions');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');


Route::group(['namespace' => 'Admin','prefix' => 'admin'],function (){

    Route::get('dashboard','DashboardController@dashboard');
    Route::get('all-users','UserController@allUsers');
    Route::get('user-view-detail/{id}/{usersubscriptiondetailsId}','UserController@getAllUserDetail');
    Route::get('changed-premium-video-access/{videoid}/{status}','UserController@changedPremiumVideoAccess');
    Route::post('delete-users/{id}','UserController@delete');

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




//************************ Training Plan *******************************************//

   Route::get('add-training-plan','TrainingPlanController@add');
   Route::post('store-training-plan','TrainingPlanController@store');
   Route::get('show-training-plan','TrainingPlanController@show');
   Route::get('edit-training-plan/{id}','TrainingPlanController@edit');
   Route::post('update-training-plan/{id}','TrainingPlanController@update');
   Route::post('delete-training-plan/{id}','TrainingPlanController@delete'); 



//************************Subscription Category *******************************************//

   Route::get('add-subscription-category','SubscriptionCategoryController@add');
   Route::post('store-subscription-category','SubscriptionCategoryController@store');
   Route::get('show-subscription-category','SubscriptionCategoryController@show');
   Route::get('edit-subscription-category/{id}','SubscriptionCategoryController@edit');
   Route::post('update-subscription-category/{id}','SubscriptionCategoryController@update');
   Route::post('delete-subscription-category/{id}','SubscriptionCategoryController@delete');




//************************Subscription Plan *******************************************//

   Route::get('add-subscription-plan','SubscriptionPlanController@add');
   Route::post('store-subscription-plan','SubscriptionPlanController@store');
   Route::get('show-subscription-plan','SubscriptionPlanController@show');
   Route::get('edit-subscription-plan/{id}','SubscriptionPlanController@edit');
   Route::post('update-subscription-plan/{id}','SubscriptionPlanController@update');
   Route::post('delete-subscription-plan/{id}','SubscriptionPlanController@delete');



//************************Subscription Plan *******************************************//

   

   Route::get('add-subscription-plan-details','SubscriptionPlanDetailsController@add');
   Route::post('store-subscription-plan-details','SubscriptionPlanDetailsController@store');
   Route::get('show-subscription-plan-details','SubscriptionPlanDetailsController@show');
   Route::get('edit-subscription-plan-details/{id}','SubscriptionPlanDetailsController@edit');
   Route::post('update-subscription-plan-details/{id}','SubscriptionPlanDetailsController@update');
   Route::post('delete-subscription-plan-details/{id}','SubscriptionPlanDetailsController@delete');



//***************************** Subscribed Workout Category ************************//

   
   Route::get('add-subscription-workout-category','SubscribedWorkoutCategoryController@add');
   Route::post('store-subscription-workout-category','SubscribedWorkoutCategoryController@store');
   Route::get('show-subscription-workout-category','SubscribedWorkoutCategoryController@show');
   Route::get('edit-subscription-workout-category/{id}','SubscribedWorkoutCategoryController@edit');
   Route::post('update-subscription-workout-category/{id}','SubscribedWorkoutCategoryController@update');
   Route::post('delete-subscription-workout-category/{id}','SubscribedWorkoutCategoryController@delete');


//********************* Subscribed Workout Category Detail*****************************************//
   
   Route::get('add-subscription-workout-category-details/{sub_id}','SubscribedWorkoutCategoryDetailsController@add');
   Route::post('store-subscription-workout-category-details/{sub_id}','SubscribedWorkoutCategoryDetailsController@store');
   Route::get('show-subscription-workout-category-details/{sub_id}','SubscribedWorkoutCategoryDetailsController@show');
   Route::get('edit-subscription-workout-category-details/{sub_id}/{id}','SubscribedWorkoutCategoryDetailsController@edit');
   Route::post('update-subscription-workout-category-details/{sub_id}/{id}','SubscribedWorkoutCategoryDetailsController@update');
   Route::post('delete-subscription-workout-category-details/{sub_id}/{id}','SubscribedWorkoutCategoryDetailsController@delete');


  
  




//**************************** Privacy Policy *******************************************//
   Route::get('add-privacy-policy','PrivacyPolicyController@add');
   Route::post('store-privacy-policy','PrivacyPolicyController@store');
   Route::get('show-privacy-policy','PrivacyPolicyController@show');
   Route::get('edit-privacy-policy/{id}','PrivacyPolicyController@edit');
   Route::post('update-privacy-policy/{id}','PrivacyPolicyController@update');
   Route::post('delete-privacy-policy/{id}','PrivacyPolicyController@delete');



 //************************ Training Goals *******************************************//

   Route::get('add-training-goals','TrainingGoalsController@add');
   Route::post('store-training-goals','TrainingGoalsController@store');
   Route::get('show-training-goals','TrainingGoalsController@show');
   Route::get('edit-training-goals/{id}','TrainingGoalsController@edit');
   Route::post('update-training-goals/{id}','TrainingGoalsController@update');
   Route::post('delete-training-goals/{id}','TrainingGoalsController@delete');



//***************************** Plan Desription **************************************//

   Route::get('add-plan-description/{training_plan_id}','PlanDescriptionController@add');
   Route::post('store-plan-description/{training_plan_id}','PlanDescriptionController@store');
   Route::get('show-plan-description/{training_plan_id}','PlanDescriptionController@show');
   Route::get('edit-plan-description/{training_plan_id}/{training_plan_description_id}','PlanDescriptionController@edit');
   Route::post('update-plan-description/{training_plan_id}/{training_plan_description_id}','PlanDescriptionController@update');
   Route::post('delete-plan-description/{training_plan_id}/{training_plan_description_id}','PlanDescriptionController@delete'); 


//********************************** Quick Clips  *********************************************************//
    


   Route::get('add-quick-clips','QuickClipsController@add');
   Route::post('store-quick-clips','QuickClipsController@store');
   Route::get('show-quick-clips','QuickClipsController@show');
   Route::get('edit-quick-clips/{id}','QuickClipsController@edit');
   Route::post('update-quick-clips/{id}','QuickClipsController@update');
   Route::post('delete-quick-clips/{id}','QuickClipsController@delete');

//********************************* Quick Clips Details ***********************************//
   Route::get('add-quick-clips_details/{clip_id}','QuickClipsDetailsController@add');
   Route::post('store-quick-clips_details/{clip_id}','QuickClipsDetailsController@store');
   Route::get('show-quick-clips_details/{clip_id}','QuickClipsDetailsController@show');
   Route::get('edit-quick-clips_details/{clip_id}/{id}','QuickClipsDetailsController@edit');
   Route::post('update-quick-clips_details/{clip_id}/{id}','QuickClipsDetailsController@update');
   Route::post('delete-quick-clips_details/{clip_id}/{id}','QuickClipsDetailsController@delete');

//****************************** Premium Videos *************************************************//
   

   Route::get('add-premium-videos','PremiumVideosController@add');
   Route::post('store-premium-videos','PremiumVideosController@store');
   Route::get('show-premium-videos','PremiumVideosController@show');
   Route::get('edit-premium-videos/{id}','PremiumVideosController@edit');
   Route::post('update-premium-videos/{id}','PremiumVideosController@update');
   Route::post('delete-premium-videos/{id}','PremiumVideosController@delete');
  Route::get('view-premium-dacast-video/{id}','PremiumVideosController@dacastVideo');



//******************************Subtitle Of Premium Videos ********************//
   

   Route::get('add-subtitle-premium-videos/{video_id}','SubtitlePremiumVideosController@add');
   Route::post('store-subtitle-premium-videos/{video_id}','SubtitlePremiumVideosController@store');
   Route::get('show-subtitle-premium-videos/{video_id}','SubtitlePremiumVideosController@show');
   Route::get('edit-subtitle-premium-videos/{video_id}/{id}','SubtitlePremiumVideosController@edit');
   Route::post('update-subtitle-premium-videos/{video_id}/{id}','SubtitlePremiumVideosController@update');
   Route::post('delete-subtitle-premium-videos/{video_id}/{id}','SubtitlePremiumVideosController@delete');





//************************************** Voice Guidance Type ************************************//

   Route::get('add-voice-guidance-type','VoiceGuidanceTypeController@add');
   Route::post('store-voice-guidance-type','VoiceGuidanceTypeController@store');
   Route::get('show-voice-guidance-type','VoiceGuidanceTypeController@show');
   Route::get('edit-voice-guidance-type/{id}','VoiceGuidanceTypeController@edit');
   Route::post('update-voice-guidance-type/{id}','VoiceGuidanceTypeController@update');
   Route::post('delete-voice-guidance-type/{id}','VoiceGuidanceTypeController@delete'); 



//****************************************** Premium Workout Details***********************************//

   Route::get('add-premium-workout-details','PremiumWorkoutDetailsController@add');
   Route::post('store-premium-workout-details','PremiumWorkoutDetailsController@store');
   Route::get('show-premium-workout-details','PremiumWorkoutDetailsController@show');
   Route::get('edit-premium-workout-details/{id}','PremiumWorkoutDetailsController@edit');
   Route::post('update-premium-workout-details/{id}','PremiumWorkoutDetailsController@update');
   Route::get('delete-premium-workout-details/{id}','PremiumWorkoutDetailsController@delete');
   Route::get('changed-payment-status-premium-workout/{status}/{id}','PremiumWorkoutDetailsController@changedPaymentStatusPremiumWorkout');
   

//****************************************** QuickClip Workout Details***********************************//

   Route::get('add-quick-clip-workout-details','QuickClipWorkoutDetailsController@add');
   Route::post('store-quick-clip-workout-details','QuickClipWorkoutDetailsController@store');
   Route::get('show-quick-clip-workout-details','QuickClipWorkoutDetailsController@show');
   Route::get('edit-quick-clip-workout-details/{id}','QuickClipWorkoutDetailsController@edit');
   Route::post('update-quick-clip-workout-details/{id}','QuickClipWorkoutDetailsController@update');
   Route::post('delete-quick-clip-workout-details/{id}','QuickClipWorkoutDetailsController@delete');



//***************************** Workout Details ******************************************//

  Route::get('add-workout-details','WorkoutDetailsController@add');
  Route::post('store-workout-details','WorkoutDetailsController@store');
  Route::get('show-workout-details','WorkoutDetailsController@show');
  Route::get('edit-workout-details/{id}','WorkoutDetailsController@edit');
  Route::post('update-workout-details/{id}','WorkoutDetailsController@update');
  Route::post('delete-workout-details/{id}','WorkoutDetailsController@delete');
  Route::post('get_workouts/{workout_type_id}','WorkoutDetailsController@getworkouts');


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



//************************************ Nucleus Challenges**************************************//


    Route::get('add-nucleus-challenge-prize/{challenge_id}','NucleusChallengesPrizeController@add');
    Route::post('store-nucleus-challenge-prize/{challenge_id}','NucleusChallengesPrizeController@store');
    Route::get('show-nucleus-challenge-prize/{challenge_id}','NucleusChallengesPrizeController@show');
    Route::get('edit-nucleus-challenge-prize/{challenge_id}/{id}','NucleusChallengesPrizeController@edit');
    Route::post('update-nucleus-challenge-prize/{challenge_id}/{id}','NucleusChallengesPrizeController@update');
    Route::post('delete-nucleus-challenge-prize/{challenge_id}/{id}','NucleusChallengesPrizeController@delete'); 



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
    Route::get('view-promo-dacast-video/{id}','PromotionManagementController@dacastVideo');  












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
  Route::get('get-workout-by-category-id','ApiDetailController@getWorkoutbyCategoryId');
  Route::get('user-select-challenge','ApiDetailController@getselectchallengeForm');
  Route::get('get-all-nucleus-challenges','ApiDetailController@getallchallengeForm');
  Route::get('get-user-challenge','ApiDetailController@getusechallengeForm');
  Route::get('training-plan-form','ApiDetailController@gettrainingplanForm');
  Route::get('social-privacy-setting-form','ApiDetailController@getsocialprivacysettingForm');
  Route::get('get-social-privacy-setting-form','ApiDetailController@getuserssocialprivacysettingForm');
  Route::get('get-subscription-plan','ApiDetailController@getsubscriptionplanform');
  Route::get('get-privacy-policy','ApiDetailController@getPrivacyPolicy');
  Route::get('submit-subscription-plan','ApiDetailController@submitsubscriptionplanform');
  Route::get('get-training-plan-form','ApiDetailController@getUserTrainingAndPlanForm');
  Route::get('get-app-version-form','ApiDetailController@getAppVersionForm');
 

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
