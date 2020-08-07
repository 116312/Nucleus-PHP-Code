@extends('admin.admin-app')
@section('title', 'Subscription Plan Details')
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
                <h2>Subscription plan</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show Details of Subscription Plan
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Subscription Category </td>
                                    <td>Subscription Plan</td>
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
                                  
                                        @foreach($subscriptionplandetails as $key => $detail)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$detail->subscriptioncategory->name}}</td>
                                            <td>{{$detail->subscriptionplan->name}}</td>
                                            <td>${{$detail->original_price}}</td>
                                            <td>{{$detail->offer_percentage}}%</td>
                                            <td>${{$detail->per_month_price}}</td>
                                             
                                            <td>{{$detail->number_of_month}}months</td>
                                            <td>${{$detail->plan_duration_price}}</td>
                                            <td>@foreach($detail->additionalbenifits as  $benifits)
                                                    <li>{{$benifits->benifits}}</li>
                                                    @endforeach
                                                </td>
                                            <form class="form-horizontal" method="post" action="{{url('admin/delete-subscription-plan-details').'/'.$detail->id}}" role="form">
                                    @csrf
                                                <td>
                                                     <a href="{{url('admin/edit-subscription-plan-details').'/'.$detail->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
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
