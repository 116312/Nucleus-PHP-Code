@extends('admin.admin-app')
@section('title', 'Show All Catgeory')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Premium Workouts</h2>
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
                                    <td>Name</td>
                                    <td>Workout Category</td>
                                    <td>Workout Type </td>
                                    <td>Workout Level </td>
                                    <td>Price (in USD)</td>
                                    <td>Trainer Name </td>
                                    <td>Workout Description </td>
                                    <td>Image</td>
                                    <td>Chapters</td>
                                
                                    <td>Action</td>
                                  

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($premiumworkoutdetails as $key => $details)
                                        <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$details->name}}</td>
                                          <td>{{$details->workoutcategory->name}}</td>
                                          <td>{{$details->workouttype->name}}</td>
                                          <td>{{$details->workout_level}}</td>
                                          <td>{{$details->price}}</td>
                                          <td>{{$details->trainer_name}}</td>
                                          <td>{{$details->description}}</td>
                                          
                                          <td> <img style="float:left!important" src="{{$details->image}}" height="100" width="100"></td> 
                                          <td>@if($details->chapters != null)

                                            @foreach($details->chapters as $chapter)
                                            <li>{{$chapter->chapter}}</li>
                                            @endforeach

                                            @endif



                                          </td>
                                         
                                          <form class="form-horizontal" method="post" action="{{url('admin/delete-premium-workout-details').'/'.$details->id}}" role="form">
                                    @csrf
                                 <td>
                                        <a href="{{url('admin/edit-premium-workout-details').'/'.$details->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                      
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