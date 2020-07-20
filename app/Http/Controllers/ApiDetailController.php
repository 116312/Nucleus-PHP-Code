<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Category;
use App\Model\NucleusChallenges;
use App\Model\TrainingPlan;
use App\Model\TrainingGoals;
use App\Model\TrainingPlanDescription;
use App\Model\PremiumVideos;

class ApiDetailController extends Controller
{
    public function registerForm(){

     $page = "register-form";
     return view('api.user-register-form',compact('page'));
       

    }



    public function loginForm(){

        return view('api.login');
    }



    public function socialLoginForm(){
       
        return view('api.social-login');
    }



    public function getcategoryForm(){
  

      $users =User::all(); 
       
       return view('api.get-all-category-form',compact('users'));

    }
   
    public function getcategoryexceptallworkout(){

        $users =User::all(); 
       
       return view('api.get-all-category-except-all-workout-form',compact('users'));
    }


    public function geteditForm(){

         $users = User::all();



         return view('api.get-edit-form',compact('users'));





    }


    public function getprofileForm(){
      
      $users = User::all();


      return view('api.get-profile-form',compact('users'));





    }


    public function getforgotpasswordForm(){

          return view('api.forgot-password');
    }


 public function getresetpasswordForm(){
   $users = User::all();

          return view('api.reset-password',compact('users'));
    }



  public function getWorkoutbyCategoryId(){
     $users = User::all();
     $categories = Category::all();
     return view('api.workout-by-category',compact('categories','users'));

  }

  public function getallchallengeForm(){
    $users = User::all();
    return view('api.get-all-challenge',compact('users'));

  }



  public function getselectchallengeForm(){
     $users = User::all();
     $challenges = NucleusChallenges::all();
     return view('api.user-select-challenge',compact('challenges','users'));


  }

  public function getusechallengeForm(){
       $users = User::all();
       return view('api.get-user-challenge',compact('users'));
  }


  public function gettrainingplanForm(){

    $users = User::all();

    $training_plan = TrainingPlan::all();

    $goals = TrainingGoals::all();

    $plan_variations = TrainingPlanDescription::all();

    return view('api.submit-training-plan-form',compact('users','training_plan','goals','plan_variations'));


  }



  public function getsocialprivacysettingForm(){
     $users = User::all();

      return view('api.submit-social-privacy-setting-form',compact('users'));



  }


  public function getuserssocialprivacysettingForm(){
     $users = User::all();

     return view('api.get-social-privacy-setting-form',compact('users'));

  }



  public function getsubscriptionplanform(){
  
     $premiumvideos = PremiumVideos::all();

     return view('api.get-subscription-plan-form',compact('premiumvideos'));


  }



   

}
