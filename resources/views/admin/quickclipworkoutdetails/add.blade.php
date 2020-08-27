@extends('admin.admin-app')
@section('title', 'Add Quick Clip Workkout Details')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Quick Clip Workout</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add Details Here
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-quick-clip-workout-details')}}" enctype="multipart/form-data">
                                @csrf


                                <label for="article_category_type">Select Workout Category</label>
                                <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="category_id" >
                                                    <option value="">-- Please select --</option>
                                                       @foreach($categories as $key => $cate)
                                                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                            </div>
                                        </div>
                                <label for="course_name">Workout Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="name" 
                                               class="form-control">
                                    </div>
                                </div>
                               
                                 <label for="course_name">Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" required name="image" id="image"
                                               class="form-control">
                                    </div>
                                </div>

                                <label for="article_category_type">Select Quick Clip</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="quick_clip_id[]" multiple>
                                                    <option value="">-- Please select --</option>
                                                       @foreach($quickclips as $key => $quickclip)
                                                        <option value="{{$quickclip->id}}">{{$quickclip->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                            </div>
                                        </div>
                                 <label for="course_name">Add Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea type="text" row = "4" required name="description" id="description"
                                               class="form-control"> </textarea> 
                                    </div>
                                </div>

                                 <label for="course_name">Rest Time Duration (in seconds)</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="rest_period" 
                                               class="form-control">
                                    </div>
                                </div>
                                <label for="course_name">Add Rest Clip</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" required name="rest_clip" id="rest_clip"
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