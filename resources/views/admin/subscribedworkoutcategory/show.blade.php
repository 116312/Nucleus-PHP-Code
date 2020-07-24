@extends('admin.admin-app')
@section('title', 'Show Subscribed Workout Category')
@section('admin-section')
    <style type="text/css">
        #all-user-datatable_wrapper{
            width: 100%;
            overflow: auto;
        }
    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Subscription Workout Category</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show Subscription Workout Category
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Subscription Category</td>
                                    <td>Subscription Plan </td>
                                    <td>Workout Category</td>
                                    <td>Original Price</td>
                                    <td>Offer(in percentage)</td>
                                    <td>Per Month Price</td>
                                    <td>Plan Duration (in months)</td>
                                    <td>Plan Price</td>
                                    <td>Additional Benifits</td>
                                    <td>Action</td>

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($subscribedcategory as $key => $sub)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$sub->subscriptionworkoutcategory->subscriptioncategory->name}}</td>
                                            <td>{{$sub->subscriptionplan->name}}</td>
                                            <td>{{$sub->subscriptionworkoutcategory->workoutcategory->name}}</td>
                                            <td>${{$sub->subscriptiondetails->original_price}}</td>
                                            <td>{{$sub->subscriptiondetails->offer_percentage}}%</td>
                                             <td>${{$sub->subscriptiondetails->per_month_price}}</td>
                                             
                                               <td>{{$sub->subscriptiondetails->number_of_month}}months</td>
                                                <td>${{$sub->subscriptiondetails->plan_duration_price}}</td>
                                                <td>@foreach($sub->subscriptionbenifits as  $benifits)
                                                    <li>{{$benifits->benifits}}</li>
                                                    @endforeach
                                                </td>
                                            <form class="form-horizontal" method="post" action="{{url('admin/delete-subscription-category').'/'.$sub->id}}" role="form">
                                    @csrf
                                                <td>
                                        <a href="{{url('admin/edit-subscription-category').'/'.$sub->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                        <a href="{{url('admin/add-subscription-workout-category-details').'/'.$sub->id}}"><button type="button" class="btn btn-primary waves-effect">Add Details</button></a>
                                        <a href="{{url('admin/edit-subscription-category').'/'.$sub->id}}"><button type="button" class="btn btn-primary waves-effect">Additional Benifits</button></a>
                                        <a href="" onclick="return confirm('Are you sure you want to delete this item?');"><button type="submit" class="btn btn-danger waves-effect">Delete</button></a>
                                                </td>
                                            </form> 
                                        </tr>
                                        @endforeach
                                    
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
