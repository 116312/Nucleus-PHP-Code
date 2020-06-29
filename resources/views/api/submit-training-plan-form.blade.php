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

    URL::{{url('/').'/api/submit-user-training-plan'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/submit-user-training-plan')}}" >
 
    Users(user_id)::*<select name="user_id" required>
    <option value="">Select</option>
        @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>

   <br>
   <br>

  Plan Type(plan_type)::*<select name="plan_type" required>
    <option value="">Select</option>
    
    <option value="How many days per week">How many days per week</option>
    <option value="By Goals">By Goals</option>
       
    </select>


    <br>
    <br>
   

   DaysPerWeek(days_per_week_id)::*<select name="days_per_week_id" required>
    <option value="">Select</option>
        @foreach($training_plan as $daysperweek)
    <option value="{{$daysperweek->id}}">{{$daysperweek->name}}</option>
        @endforeach
    </select>


    <br>
    <br>
   

   Goals(goal_id)::*<select name="goal_id" required>
    <option value="">Select</option>
        @foreach($goals as $goal)
    <option value="{{$goal->id}}">{{$goal->title}}</option>
        @endforeach
        </select>

<br>
<br>

     Plan Variation(plan_variation_id)::*<select name="plan_variation_id" required>
    <option value="">Select</option>
        @foreach($plan_variations as $variation)
    <option value="{{$variation->id}}">{{$variation->name}}</option>
        @endforeach
        </select>


<br>
<br>
<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>
</form>
</body>
</html>