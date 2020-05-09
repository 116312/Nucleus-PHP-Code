@extends('admin.admin-app')
@section('title', 'Show All Training Plan Descriptions')
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
                                Show Training Plan Description
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                               
                                    <td>Training Plan Name</td>
                                    <td>Monday</td>
                                    <td>Tuesday</td>
                                    <td>Wednesday</td>
                                    <td>Thursday</td>
                                    <td>Friday</td>
                                    <td>Saturday</td>
                                    <td>Sunday</td>
                                    <td>Action</td>

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($plandescription as $key => $plan)
                                        <tr>
                                            <td>{{++$key}}</td>
                                          
                                            <td>{{$trainingplan->name}}</td>
                                            <td>{{$plan->monday}}</td>
                                            <td>{{$plan->tuesday}}</td>
                                            <td>{{$plan->wednesday}}</td>
                                            <td>{{$plan->thursday}}</td>
                                            <td>{{$plan->friday}}</td>
                                            <td>{{$plan->saturday}}</td>
                                            <td>{{$plan->sunday}}</td>


                                            <form class="form-horizontal" method="post" action="{{url('admin/delete-plan-description').'/'.$trainingplan->id.'/'.$plan->id}}" role="form">
                                    @csrf
                                        <td>
                                        <a href="{{url('admin/edit-plan-description').'/'.$trainingplan->id.'/'.$plan->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                      
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