@extends('admin.admin-app')
@section('title', 'Show Promotion Video')
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
                                Show Video For Promotion 
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Video</td>
                                   
                                  
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($video_promotion as $key => $promo)
                                    <tr>
                                     <td>{{++$key}}</td>
                                    
                                     <td><video width="320" height="240" controls>
  <source src="{{$promo->promofiles->file}}" type="video/mp4">
 
Your browser does not support the video tag.
</video></td>
                                     <form class="form-horizontal" method="post" action="{{url('admin/delete-promo').'/'.$promo->id}}" role="form">
                                    @csrf
                                    <td>
                                    <a href="{{url('admin/edit-promo_video').'/'.$promo->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
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
