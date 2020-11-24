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
    URL::   {{url('/').'/api/register-user'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/register-user')}}" >
   

   

    User Name(name) ::*<input type="text"  name="name" required>
    <br />
    <br />
    Contact Number (contact_no) ::*<input type="text"  name="contact_no" required>
    <br />
    <br />
   
    User Email(email) ::*<input type="text"  name="email" required>
    <br />
    <br />
    Country(country) ::*<input type="text"  name="country" required>
    <br />
    <br />

    Password(password) ::*<input type="password"  name="password" required>
    <br />
    <br />

    Device ID(device_id) ::*<input type="text" name="device_id" required>
    <br />
    <br />

<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>

</form>
</body>
</html>