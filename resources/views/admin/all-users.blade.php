@extends('admin.admin-app')
@section('title', 'Show All Users')
@section('admin-section')
    <style type="text/css">
        #all-user-datatable_wrapper , .over-flow_table{
            width: 100%;
            overflow: auto;
        }
    </style>
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Users</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card over-flow_table " >
                        <div class="header">
                            <h2>
                                Show Users
                            </h2>
                        </div>
                        <div class="body">
                       <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>User Name</td>
                                    <td>Registered Date</td>
                                    <td>Mobile Number</td>
                                    <td>Country</td>
                                    <td>Email</td>
                                    <td>Gender</td>
                                    <td>Date of Birth</td>
                                    <td>Profile Image</td>
                                    <td>Height</td>
                                    <td>Weight</td>
                                    

                                    <td>Is Subscribed User </td>
                                    <td>Product </td>
                                    <td>Subscription Date </td>
                                    <td>Payment ID </td>
                                    <td>Transaction ID</td>
                                    <td>Amount</td>
                                    <td>Subscription Category</td>
                                    <td>Subscription Plan </td>
                                    <td>Start Date </td>
                                    <td>End Date </td>

                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                               
                              
                               @foreach($users as $key => $user)
                                @if($user->usersubscriptiondetails != null)
                                   <tr class="success">
                                       <td>{{$key + 1}}</td>
                                       <td>{{$user->name}}</td>
                                       <td>{{$user->created_at}}</td>
                                       <td>{{$user->contact_no}}</td>
                                       <td>{{$user->country}}</td>
                                       <td>{{$user->email}}</td>
                                       <td>{{$user->gender}}</td>
                                       <td>{{$user->dob}}</td>
                                       <td><img style="float:left!important" src="{{$user->image}}" height="100" width="100"></td>
                                       <td>{{$user->height}}</td>
                                       <td>{{$user->weight}}</td>
                                       <td>Yes</td>
                                       <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->product}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->created_at}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->payment_id}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->transaction_id}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->amount}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{\App\Model\SubscriptionCategory::where('id',$user->usersubscriptiondetails->usersubscriptionplandetails->subscription_category_id)->first()->name}}@else NA @endif</td>
                                        <td> @if($user->usersubscriptiondetails != null){{\App\Model\SubscriptionPlan::where('id',$user->usersubscriptiondetails->usersubscriptionplandetails->subscription_plan_id)->first()->name}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->usersubscriptionplandetails->start_date}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->usersubscriptionplandetails->end_date}}@else NA @endif   </td>
                                       <form class="form-horizontal" method="post" action="{{url('admin/delete-users').'/'.$user->id}}" role="form">
                                    @csrf
                                       <td>

                                         <a href="" onclick="return confirm('Are you sure you want to delete this item?');"><button type="submit" class="btn btn-danger waves-effect">Delete</button></a>
                                      </form>
                                         <a href="{{url('admin/user-view-detail').'/'.$user->id}}/{{ $user->usersubscriptiondetails->id }}" onclick="return confirm('Are you sure you want to show ?');"><button type="submit" class="btn btn-success waves-effect">View Detail</button></a>
                                    </td>
                               
                                   </tr>
                                   @else
                                     <tr>
                                       <td>{{$key + 1}}</td>
                                       <td>{{$user->name}}</td>
                                       <td>{{$user->created_at}}</td>
                                       <td>{{$user->contact_no}}</td>
                                       <td>{{$user->country}}</td>
                                       <td>{{$user->email}}</td>
                                       <td>{{$user->gender}}</td>
                                       <td>{{$user->dob}}</td>
                                       <td><img style="float:left!important" src="{{$user->image}}" height="100" width="100"></td>
                                       <td>{{$user->height}}</td>
                                       <td>{{$user->weight}}</td>
                                       <td>No</td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->product}}@else NA @endif</td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->created_at}}@else NA @endif</td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->payment_id}}@else NA @endif</td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->transaction_id}}@else NA @endif</td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->amount}}@else NA @endif</td>
                                        <td> @if($user->usersubscriptiondetails != null){{\App\Model\SubscriptionCategory::where('id',$user->usersubscriptiondetails->usersubscriptionplandetails->subscription_category_id)->first()->name}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{\App\Model\SubscriptionPlan::where('id',$user->usersubscriptiondetails->usersubscriptionplandetails->subscription_plan_id)->first()->name}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->usersubscriptionplandetails->start_date}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->usersubscriptionplandetails->end_date}}@else NA @endif   </td>
                                       <form class="form-horizontal" method="post" action="{{url('admin/delete-users').'/'.$user->id}}" role="form">
                                    @csrf
                                       <td>

                                         <a href="" onclick="return confirm('Are you sure you want to delete this item?');"><button type="submit" class="btn btn-danger waves-effect">Delete</button></a>
                                    </td>
                                </form>
                                   </tr>
                                   @endif 
                               @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    


    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script>
    $(function(){
    $("#all-user-datatable").dataTable();
  })
  </script>
    

@endsection
