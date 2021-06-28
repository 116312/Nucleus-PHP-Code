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
                        <div class="body table-responsive">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable1">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Name</td>
                                    <td>Workout Category</td>
                                    <td>Workout Type</td>
                                    <td>Workout Level</td>
                                    <td>Price (in USD)</td>
                                    <td>Trainer Name</td>
                                    <td>Workout Description</td>
                                    <td>Image</td>
                                    <td style="width:330px !important">Chapters</td>
                                    <td>Free/Paid Status</td>
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
                                            <li style="width:300px">{{$chapter->chapter}}</li>
                                            @endforeach

                                            @endif
                                           </td>
                                          
                                           <td>
                                            @if($details->IsPaid=='0')  
                                          
                                          
                                               
                                <a href="{{url('admin/changed-payment-status-premium-workout/1').'/'.$details->id}}" onclick="return confirm('Are you sure you want to chnaged  Paid Status Mode ?');"><button type="button" class="btn btn-primary waves-effect">Free</button></a>
                                    
                                            @endif
                                            
                                      
                                       @if($details->IsPaid=='1') 
                                       
                                       
                                   <a href="{{url('admin/changed-payment-status-premium-workout/0').'/'.$details->id}}" onclick="return confirm('Are you sure you want to chnaged  Paid Status Mode ?');"><button type="submit" class="btn btn-danger waves-effect">Paid</button></a>
                                                @endif 
                                                
                                               </td>
                                   
                                         
                                          
                                 <td>
                                     <div class="action_btn">
    <a role="button" class="btn btn-primary waves-effect" href="{{url('admin/edit-premium-workout-details').'/'.$details->id}}">Edit</a>
    <a class="btn btn-danger waves-effect" href="{{url('admin/delete-premium-workout-details').'/'.$details->id}}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
    </div> 
                                    </td>
                              
                                         
                                          
                                      
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
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script>
    $(function(){
    $("#all-user-datatable1").dataTable();
  })
  </script>

@endsection