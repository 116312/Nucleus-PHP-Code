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
                                   

                                </tr>
                                </thead>
                                <tbody>
                               @foreach($users as $key => $user)
                                   <tr>
                                       <td>{{$key + 1}}</td>
                                       <td>{{$user->name}}</td>
                                       <td>{{$user->contact_no}}</td>
                                       <td>{{$user->email}}</td>
                                      

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
