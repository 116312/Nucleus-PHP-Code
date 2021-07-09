@extends('admin.admin-app')
@section('title', 'Show Quick Clips Details')
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
                                Show Quick Clips Details 
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Voice Guidance Type </td>
                                    <td>Language</td>
                                    <td> Video with subtitle and audio </td>
                                    <td>Action</td>
                                  
                                  

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($quickclipdetails as $key => $details)
                                        <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$details->voiceguidancetype->name}}</td>
                                          <td>{{$details->language->name}}
                                           <td> <video id="myvideo" width="320" height="240" controls muted>
											    <source src="{{$details->quickclips->clip}}" type="video/mp4" />
											    <track label="{{$details->language->name}}" kind="subtitles" srclang="en" src="{{$details->subtitle}}" default>
											    <audio id="myaudio" controls>
											    <source src="{{$details->audio}}" type="audio/mpeg"/>
											    </audio>
											</video>

                                          </td> 

                                            <form class="form-horizontal" method="post" action="{{url('admin/delete-quick-clips_details').'/'.$clip_id.'/'.$details->id}}" role="form">
                                    @csrf
                                        <td>
                                        <a href="{{url('admin/edit-quick-clips_details').'/'.$clip_id.'/'.$details->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                      
                                        <a href="" onclick="return confirm('Are you sure you want to delete this item?');"><button type="submit" class="btn btn-danger waves-effect">Delete</button></a>
                                        </td>
                                            </form> 
                                        </tr>  
                                      
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
<script>
var myvideo = document.getElementById("myvideo");
var myaudio = document.getElementById("myaudio");
myvideo.onplay  = function() { myaudio.play();  }
myvideo.onpause = function() { myaudio.pause(); }
</script>
@endsection
