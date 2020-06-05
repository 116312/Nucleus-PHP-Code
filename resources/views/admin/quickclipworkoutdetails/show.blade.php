@extends('admin.admin-app')
@section('title', 'Show All Catgeory')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Quick Clip Workouts</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show Details
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Workout Category</td>
                                    <td>Quick Clip Workout Name</td>
                                    <td>Quick clip Workout Image</td>
                                    <td>Quick Clip Name </td>
                                    <td>Rest Period</td>
                                         <td>Description</td>

                                  

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($quickclipworkoutdetails as $key => $details)
                                        <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$details->quickclipworkoutdetails->workoutcategory->name}}</td>
                                          <td>{{$details->quickclipworkoutdetails->name}}</td>
                                          <td> <img style="float:left!important" src="{{$details->quickclipworkoutdetails->image}}" height="100" width="100"></td>
                                          <td>{{$details->quickclips->name}}</td>
                                          <td>{{$details->quickclipworkoutdetails->rest_period}}</td> 
                                          <td>{{$details->quickclipworkoutdetails->description}}</td> 

                                         
                                         
                                          
                                      
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