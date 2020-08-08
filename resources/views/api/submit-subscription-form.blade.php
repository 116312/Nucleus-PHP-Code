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

    URL::{{url('/').'/api/submit-user-subscription'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/submit-user-subscription')}}" >
 
    Users(user_id)::*<select name="user_id" required>
    <option value="">Select</option>
        @foreach($users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    <br />
    <br />
    payment_id(payment_id) ::*<input type="text" name="payment_id" required>
    <br />
    <br />
    <br />
    <br />
    transaction_id(transaction_id) ::*<input type="text" name="transaction_id" required>
    <br />
    <br />
    <br />
    <br />
    amount(amount) ::*<input type="text" name="amount" >
    <br />
    <br />

    Product(product)::*<select name="product" required>
    <option value="">Select</option>
    <option value="Subscription Plan">Subscription Plan</option>
    <option value="Video">Video</option>
    </select>
    <br/>
    <br/>

   

    Subscription Category(subscription_category_id)::*<select name="subscription_catgeory_id" required>
    <option value="">Select</option>
        @foreach($subscription_categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    Subscription Plan(subscription_plan_id)::*<select name="subscription_plan_id" required>
    <option value="">Select</option>
        @foreach($subscription_plan as $sub_plan)
        <option value="{{$sub_plan->id}}">{{$sub_plan->name}}</option>
        @endforeach
    </select>

<button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>
</form>
</body>
</html>