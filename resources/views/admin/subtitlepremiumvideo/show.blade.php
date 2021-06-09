@extends('admin.admin-app')
@section('title', 'Show All Subtitle of Premium Video')
@section('admin-section')
  
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Subtile Of Premium Video</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show All Subtitle 
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Language</td>
                                    <td>Video With Subtitle </td>
                                  

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($video_subtitle as $key => $subtitle)
                                        <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$subtitle->languages->name}}</td>
                                           <td> <video width="320" height="240"  Autoplay=autoplay controls>
                                              <source src="{{$video->video}}" type="video/mp4" >
                                              <source src="{{$video->video}}" type="video/webm">
                                              <track label="English" kind="subtitles" srclang="en" src="{{$subtitle->subtitle}}" default>
                                               <track label="Spanish" kind="subtitles" srclang="en" src="{{$subtitle->subtitle}}" default>
                                                <track label="German" kind="subtitles" srclang="en" src="{{$subtitle->subtitle}}" default>    
                                            Your browser does not support the video tag.
                                            </video>

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

@endsection
