<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Panel</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        });
    </script>
</head>
<body>

<div id="accordion">
   

    <h3>User</h3>
    <div>
        <p><a href="{{url('/api-details/register-form')}}">Register</a></p>
        <p><a href="{{url('/api-details/login-form')}}">User Login</a></p>
        <p><a href="{{url('/api-details/social-login-form')}}">Social Login</a></p>
        <p><a href="{{url('/api-details/edit-profile-form')}}">Edit Profile</a></p>
        <p><a href="{{url('/api-details/get-profile-form')}}">Get Profile</a></p>
        <p><a href="{{url('/api-details/forgot-password-form')}}">Forgot Password</a></p>
        <p><a href="{{url('/api-details/reset-password-form')}}">Reset Password</a></p>
        <p><a href="{{url('/api-details/social-privacy-setting-form')}}">social privacy setting</a></p>
        <p><a href="{{url('/api-details/get-social-privacy-setting-form')}}">GET social privacy setting</a></p>
       
    </div>
        <h3>Categories</h3>
    <div>
 
    <p><a href="{{url('/api-details/get-all-categories-form')}}">Get All Categories</a></p>
     <p><a href="{{url('/api-details/get-categories-form')}}">Get Categories except all workout category</a></p>
      
   </div>



    <h3>Workout</h3>
    <div>
 
     <p><a href="{{url('/api-details/get-workout-by-category-id')}}">Get Workouts by Category</a></p>
     
      
   </div>


 
 <h3>All Challenges</h3>
     <div>
        
    <p><a href="{{url('/api-details/get-all-nucleus-challenges')}}">Get All Challenges</a></p>
    <p><a href="{{url('/api-details/user-select-challenge')}}">Select Challenge</a></p>
    <p><a href="{{url('/api-details/get-user-challenge')}}">Get User Challenge</a></p>
      
   </div>



   <h3>All Promotions</h3>
     <div>
    <h1>
    URL:: {{url('/').'/api/get-all-promotions'}}

    </h1>
    <p><a href="{{url('/api/get-all-promotions')}}">Get All Promotions</a></p>
      
   </div>

   

   <h3>Training and Plans</h3>
    <div>
        <p><a href="{{url('/api-details/training-plan-form')}}">Submit</a></p>
        <p><a href="{{url('/api-details/get-training-plan-form')}}">Get</a></p>
       
       
    </div>

    <h3>Check Video on Video player</h3>
     <div>
    <h1>
    URL:: {{url('/').'/api/check-video'}}

    </h1>
    <p><a href="{{url('/api/get-all-promotions')}}">Get All Promotions</a></p>
      
   </div>

    <h3>Subscriptions</h3>
    <div>
 
    <p><a href="{{url('/api-details/get-subscription-plan')}}">Get  Subscription Plan by Video Id</a></p>
    <p><a href="{{url('/api-details/submit-subscription-plan')}}">Submit Subscription</a></p>
   
      
   </div>

   <!--  <h3>Privacy Policy</h3>
    <div>
  URL:: {{url('/').'/api/get-privacy-policy'}}
  <form method="POST" enctype="multipart/form-data" action="{{url('/api/get-privacy-policy')}}" >
   <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Get</button>
   
      </form>
   </div> -->
   <h3>Terms and Conditions</h3>
    <div>
  URL:: {{url('/').'/terms_and_conditions'}}
    
    <p><a href="{{url('/terms_and_conditions')}}">Get</a></p>
      </form>
   </div>

    <h3>App Version</h3>
    <div>

    
    <p><a href="{{url('/api-details/get-app-version-form')}}">Get App Version Form</a></p>
      
   </div>                                                                                       
   


</div>




</body>
</html>