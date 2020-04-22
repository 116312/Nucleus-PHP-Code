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
    URL::   {{url('/').'/api/update-profile'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/update-profile')}}" >

    Users(user_id)::*<select name="user_id" required>
    <option value="">Select</option>
        @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    <br />
    <br />
    Name (name) ::*<input type="text" value ="{{$user->name}}" name="name" >
    <br />
    <br />
    Contact Number (contact_no) ::*<input type="text" value ="{{$user->contact_no}}" name="contact_no" >
    <br />
    <br />
    Gender(gender) ::*<input type="text" value ="{{$user->gender}}" name="gender" >
    <br />
    <br />
    Age(age) ::*<input type="text" value ="{{$user->age}}" name="age" >
    <br />
    <br />
  
    Weight(age) ::*<input type="text" value ="{{$user->weight}}"  name="weight" >
    <br />
    <br />
    Height(height) ::*<input type="text" value ="{{$user->height}}"  name="height" >
    <br />
    <br />
    Image(image)::*<input type="file"  name="image" >




<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>

</form>
</body>
</html>