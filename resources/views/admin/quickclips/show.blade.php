@extends('admin.admin-app')
@section('title', 'Show All Quick Clips')
@section('admin-section')
  
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Quick Clips</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show Quick Clips
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Name</td>
                                    <td>Start Point </td>
                                    <td>End  Point </td>
                                    <td>Number of  loops </td>
                                    <td>Quick Clips</td>
                                    <td>Clip Image</td>

                                    <td>Action</td>

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($clips as $key => $clip)
                                        <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$clip->name}}</td>
                                          <td>{{$clip->start_loop_point}}</td>
                                          <td>{{$clip->end_loop_point}}</td>
                                          <td>{{$clip->number_of_loop}}</td>
                                        
                                           <td><img style="float:left!important" src="{{$clip->image}}" height="100" width="100"></td>
                                          <td><video width="320" height="240"   controls>
                                              <source src="{{$clip->clip}}" type="video/mp4" >
                                              <source src="{{$clip->clip}}" type="video/webm">
                                                
                                            Your browser does not support the video tag.
                                            </video></td>
                                         
                                            <form class="form-horizontal" method="post" action="{{url('admin/delete-quick-clips').'/'.$clip->id}}" role="form">
                                    @csrf
                                 <td>
                                        <a href="{{url('admin/edit-quick-clips').'/'.$clip->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                        <a href="{{url('admin/add-quick-clips_details').'/'.$clip->id}}"><button type="button" class="btn bg-pink waves-effect">Add Voice Guidance and Subtitle</button></a>
                                        <a href="{{url('admin/show-quick-clips_details').'/'.$clip->id}}"><button type="button" class="btn bg-orange waves-effect">View</button></a>
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
