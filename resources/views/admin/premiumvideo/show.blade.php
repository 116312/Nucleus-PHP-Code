@extends('admin.admin-app')
@section('title', 'Show All Catgeory')
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
                <h2>Premium Videos</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show videos
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable1">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Name</td>
                                    <td>Language</td>
                                    <td>Video</td>
                                    <td>Dacast Link </td>
                                    <td>Content ID</td>
                                    <td> In App will Play </td>
                                    <td>No. Of Subtitle Added </td>
                                    <td>Action</td>

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($premium_videos as $key => $video)
                                        <tr>
                                          <td>{{++$key}}</td>

                                          <td>{{$video->name}}</td>
                                          <td>{{$video->language}}</td>
                                          <td> <video width="130" height="100"   controls>
                                              <source src="{{$video->video}}" type="video/mp4" >
                                              <source src="{{$video->video}}" type="video/webm">
                                                
                                            Your browser does not support the video tag.
                                            </video>

                                          </td>
                                          <td>  <a href="{{url('admin/view-premium-dacast-video').'/'.$video->id}}"><button type="button" class="btn btn-primary waves-effect">View Dacast Video</button></a></td></td>
                                          <td>{{$video->content_id}}</td>
                                          <td>{{$video->active_for_app}}</td>
                                           <td>{{$video->total_subtitle}}</td>
                                            <form class="form-horizontal" method="post" action="{{url('admin/delete-premium-videos').'/'.$video->id}}" role="form">
                                    @csrf
                                 <td>
                                     <div class="action_btn">
                                        <a href="{{url('admin/edit-premium-videos').'/'.$video->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                          <a href="{{url('admin/add-subtitle-premium-videos').'/'.$video->id}}"><button type="button" class="btn btn-primary waves-effect">Add Subtitle</button></a>
                                            <a href="{{url('admin/show-subtitle-premium-videos').'/'.$video->id}}"><button type="button" class="btn btn-primary waves-effect">View All Added Subtitle</button></a>
                                        <a href="" onclick="return confirm('Are you sure you want to delete this item?');"><button type="submit" class="btn btn-danger waves-effect">Delete</button></a>
                                   </div> </td>
                                </form>
                                      
                                         </tr>
                                         @endforeach
                                </tbo dy>
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