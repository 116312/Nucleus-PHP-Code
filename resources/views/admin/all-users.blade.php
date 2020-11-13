@extends('admin.admin-app')
@section('title', 'Show All Users')
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
                <h2>Users</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show Users
                            </h2>
                        </div>
                        <div class="body">



                            <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>User Name</td>
                                    <td>Mobile Number</td>
                                    <td>Email</td>
                                    <td>Gender</td>
                                    <td>Date of Birth</td>
                                    <td>Profile Image</td>
                                    <td>Height</td>
                                    <td>Weight</td>

                                    <td>Is Subscribed User </td>
                                    <td>Product </td>
                                    <td>Subscription Date </td>
                                    <td>Amount</td>
                                    <td>Subscription Category</td>
                                    <td>Subscription Plan </td>
usersubscriptionplandetails

                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($users as $key => $user)
                                   <tr>
                                       <td>{{$key + 1}}</td>
                                       <td>{{$user->name}}</td>
                                       <td>{{$user->contact_no}}</td>
                                       <td>{{$user->email}}</td>
                                       <td>{{$user->gender}}</td>
                                       <td>{{$user->dob}}</td>
                                       <td><img style="float:left!important" src="{{$user->image}}" height="100" width="100"></td>
                                       <td>{{$user->height}}</td>
                                       <td>{{$user->weight}}</td>
                                       <td>@if($user->usersubscriptiondetails != null) YES @else No @endif</td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->product}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->created_at}}@else NA @endif   </td>
                                        <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->amount}}@else NA @endif   </td>
                                         <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->usersubscriptionplandetails->subscriptioncategory->name}}@else NA @endif   </td>
                                          <td> @if($user->usersubscriptiondetails != null){{$user->usersubscriptiondetails->usersubscriptionplandetails->subscriptionplan->name}}@else NA @endif   </td>
                                       <form class="form-horizontal" method="post" action="{{url('admin/delete-users').'/'.$user->id}}" role="form">
                                    @csrf
                                       <td>

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
