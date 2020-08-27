<!doctype html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Panel</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
    <!-- Jquery Core Js -->
    <script src="{{URL::asset('public/plugins/jquery/jquery.min.js')}}"></script>


</head>
<body>

<h1>

    URL::{{url('/').'/api/submit-social-privacy-setting'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/submit-social-privacy-setting')}}" >
 
   Users(user_id)::*<select name="user_id" required>
    <option value="">Select</option>
        @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>

    <br>
    <br>


  Username(name)::<select name="name">
    <option value="">Select</option>
       
    <option value="private">private</option>
    <option value="public">public</option>
    </select>

    <br>
    <br>


   Email(email)::<select name="email">
    <option value="">Select</option>
       
    <option value="private">private</option>
    <option value="public">public</option>
    </select>

    <br>
    <br>

    Gender(gender)::<select name="gender">
    <option value="">Select</option>
       
    <option value="private">private</option>
    <option value="public">public</option>
    </select>
 
   <br>
   <br>


    Age(age)::<select name="age">
    <option value="">Select</option>
       
    <option value="private">private</option>
    <option value="public">public</option>
    </select>
 
   <br>
   <br>
    Weight(weight)::<select name="weight">
    <option value="">Select</option>
       
    <option value="private">private</option>
    <option value="public">public</option>
    </select>
 
   <br>
   <br>

    Height(height)::<select name="height">
    <option value="">Select</option>
       
    <option value="private">private</option>
    <option value="public">public</option>
    </select>
 
   <br>
   <br>

    Workout Images and Videos(images_videos)::<select name="images_videos">
    <option value="">Select</option>
       
    <option value="private">private</option>
    <option value="public">public</option>
    </select>
 
   <br>
   <br>
    

   Workout Results(workout_result)::<select name="workout_result">
    <option value="">Select</option>
       
    <option value="private">private</option>
    <option value="public">public</option>
    </select>
 
   <br>
   <br>

   





  
   
<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>
</form>
</body>
</html>