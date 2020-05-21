@extends('admin.admin-app')
@section('title', 'Edit Premium Video')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Premium Video</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Edit Premium Video
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/update-premium-videos').'/'.$video->id}}" enctype="multipart/form-data">
                                @csrf


                               
                                 <label for="course_name">Add title of the Video</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="name" value = "{{$video->name}}" id="language"
                                               class="form-control">
                                    </div>
                                </div>


                                  <label for="course_name">Select Native Language of Video</label>
                          <div class="form-group">
                                <div class="form-line">
                        <select class="form-control show-tick" required name="language">
                        <option value="">--Select--</option>
                            
                                @foreach($languages as $key => $language)
                                <option value="{{$language->name}}" {{$video->language == $language->name ? 'selected':''}}>{{$language->name}}</option>
                                @endforeach
                             </select>
                         </div>
                     </div>
                                 <label for="course_name">Add Video</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <video width="320" height="240" controls>
                                              <source src="{{$video->video}}" type="video/{{$video->extension_type}}">
                                              
                                            Your browser does not support the video tag.
                                            </video>
                                        <input type="file"  name="video" id="language"
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