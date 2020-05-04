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
       
    </div>
        <h3>Categories</h3>
    <div>
 
    <p><a href="{{url('/api-details/get-all-categories-form')}}">Get All Categories</a></p>
     <p><a href="{{url('/api-details/get-categories-form')}}">Get Categories except all workout category</a></p>
      
   </div>

 
 <h3>All Challenges</h3>
     <div>
        <h1>
    URL:: {{url('/').'/api/get-all-nucleus-challenges'}}

</h1>
    <p><a href="{{url('/api/get-all-nucleus-challenges')}}">Get All Challenges</a></p>
      
   </div>



   <h3>All Promotions</h3>
     <div>
        <h1>
    URL:: {{url('/').'/api/get-all-promotions'}}

</h1>
    <p><a href="{{url('/api/get-all-promotions')}}">Get All Promotions</a></p>
      
   </div>
   


</div>




</body>
</html>