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
    URL::   {{url('/').'/api/save-version'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/save-version')}}" >
   

   

    Device Type(device_type) ::*<select name="device_type" required>
         <option value="android">android</option>
          <option value="ios">ios</option>
    <br />
  Version (version) ::*<input type="text"  name="version" required>
    <br />
    <br />
   
  
<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>

</form>
</body>
</html>