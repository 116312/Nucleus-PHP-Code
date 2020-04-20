@extends('admin.admin-app')
@section('title', 'Edit Promotion Workout Category')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Workout Category</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Edit Promotional Video Here
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/update-promo').'/'.$video_promotion->id}}" enctype="multipart/form-data">
                                @csrf
                            <input type="hidden"  name="promo_type" value= "video" id="promo_type" class="form-control">
									

                                          <label for="course_name">Promotion Video</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <video width="320" height="240" controls>
                                                    <source src="{{$video_promotion->promofiles->file}}" type="video/mp4">
 
                                                    Your browser does not support the video tag.
                                                    </video>
                                                    <input type="file"  name="promo_file" id="image"
                                                           class="form-control">
                                                </div>
                                            </div>
									                              

                                
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection