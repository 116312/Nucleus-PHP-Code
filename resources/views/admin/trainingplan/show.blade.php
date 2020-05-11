@extends('admin.admin-app')
@section('title', 'Show All Training Plan')
@section('admin-section')
  
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
                                Show Training Plan
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>Plan No.</td>
                               
                                    <td>Training Plan Name</td>
                                    <td>Action</td>

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($trainingplan as $key => $plan)
                                        <tr>
                                            <td>{{++$key}}</td>
                                          
                                            <td>{{$plan->name}}</td>


                                            <form class="form-horizontal" method="post" action="{{url('admin/delete-training-plan').'/'.$plan->id}}" role="form">
                                    @csrf
                                        <td>
                                        <a href="{{url('admin/edit-training-plan').'/'.$plan->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                        <a href="{{url('admin/add-plan-description').'/'.$plan->id}}"><button type="button" class="btn btn-primary waves-effect">Add Plan</button></a>
                                        <a href="{{url('admin/show-plan-description').'/'.$plan->id}}"><button type="button" class="btn btn-primary waves-effect">View All Plans</button></a>
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