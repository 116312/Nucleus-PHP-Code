@extends('admin.admin-app')
@section('title', 'Edit Quick Clip')
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
                               Add New Quick Clips
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/update-quick-clips').'/'.$clip->id}}" enctype="multipart/form-data">
                                @csrf


                               
                                 <label for="course_name">Add title of the Quick Clips</label>
                                <div class="form-group">
                                    <div class="form-line">

                                        <input type="text" required  value="{{$clip->name}}" name="name" id="language"
                                               class="form-control">
                                    </div>
                                </div>
                                 <label for="course_name">Add Quick Clips</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <video width="320" height="240"  Autoplay=autoplay controls>
                                              <source src="{{$clip->clip}}" type="video/mp4" >
                                              <source src="{{$clip->clip}}" type="video/webm">
                                                
                                            Your browser does not support the video tag.
                                            </video>
                                        <input type="file"  name="clip" id="language"
                                               class="form-control">
                                    </div>
                                </div>


                                <label for="course_name">Add Clip Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file"  name="image" id="language"
                                               class="form-control">
                                    </div>
                                </div>

                                <label for="course_name">Start loop point(in sec)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="start_loop_point" id="language" value ="{{$clip->start_loop_point}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <label for="course_name">End loop point(in sec)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="end_loop_point" id="language" value ="{{$clip->end_loop_point}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <label for="course_name">Number of loops</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" required name="number_of_loops" id="language" value ="{{$clip->number_of_loops}}"
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