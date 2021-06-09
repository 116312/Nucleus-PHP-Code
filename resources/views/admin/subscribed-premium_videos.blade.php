@extends('admin.admin-app')
@section('title', 'subscribed premium Video')
@section('admin-section')
    <style type="text/css">
        #all-user-datatable_wrapper{
            width: 100%;
            overflow: auto;
        }
        
        .page-loader-wrapper{display:none ;}
    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>subscribed premium Video</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                subscribed Prime Video
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Video  Name</td>
                                    <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                         @foreach($premium_videos as $key => $video)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$video->name}}</td>
                                           
                                                <td>
                                                    @if($video->access==1)
                                                    
                                <a href="{{url('admin/changed-premium-video-access').'/'.$video->id}}/0" onclick="return confirm('Are you sure you want to Dectivate this video ?');"><button type="button" class="btn btn-primary waves-effect">Activated</button></a>
                                          @else
                               <a href="{{url('admin/changed-premium-video-access').'/'.$video->id}}/1" onclick="return confirm('Are you sure you want to Activate this video ??');"><button type="submit" class="btn btn-danger waves-effect">Deactivated</button></a>
                                           @endif 
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
