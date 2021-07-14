@extends('admin.admin-app')
@section('title', 'Edit Promotion Video')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Promotional Video</h2>
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
                                    

                                          <label for="course_name">Add Video</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        @if($video_promotion->promovideo != null)
                                         <video width="320" height="240" controls>
                                              <source src="{{$video_promotion->promovideo->video}}" type="video/mp4">
                                              
                                            Your browser does not support the video tag.
                                            </video>

                                            @endif
                                        <input type="file"  name="video" id="language"
                                               class="form-control">
                                    </div>
                                </div>

                                            <label for="course_name">Thumbnail Image</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                      <img src="{{$video_promotion->promofiles->file}}" height="100" width="100">
                                                    <input type="file"  name="promo_file" id="image"
                                                           class="form-control">
                                                </div>
                                            </div>

                                            <label for="course_name">Dacast link for Promotion</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" value="{{$video_promotion->promovideo->dacast_link}}"  name="dacast_link" id="image"
                                                           class="form-control">
                                                </div>
                                            </div>

                                           <label for="course_name">Provide Content Id of Dacast link for Promotion</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" value="{{$video_promotion->promovideo->content_id}}"  name="content_id" id="image"
                                                           class="form-control">
                                                </div>
                                            </div>

                                            <label for="article_category_type">Select Applicable for App</label>
                                          <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="applicable_for_app">
                                                    <option value="">-- Please select --</option>
                                                       <option value="Dacast Link" {{$video_promotion->promovideo->applicable_for_app == "Dacast Link" ? 'selected':''}}>Dacast Link</option>
                                                       <option value="Uploaded video" {{$video_promotion->promovideo->applicable_for_app == "Uploaded video" ? 'selected':''}}>Uploaded video</option>
                                                    </select>
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