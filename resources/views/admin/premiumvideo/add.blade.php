@extends('admin.admin-app')
@section('title', 'Add Premium Video')
@section('admin-section')

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
                               Add New Premium Video
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-premium-videos')}}" enctype="multipart/form-data">
                                @csrf


                               
                         <label for="course_name">Add title of the Video</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" required name="name" id="language"
                                       class="form-control">
                            </div>
                        </div>

                        <label for="course_name">Select Native Language of Video</label>
                          <div class="form-group">
                                <div class="form-line">
                        <select class="form-control show-tick" required name="language">
                        <option value="">--Select--</option>
                            
                                @foreach($languages as $key => $language)
                                <option value="{{$language->name}}">{{$language->name}}</option>
                                @endforeach
                             </select>
                         </div>
                     </div>

                        <label for="course_name">Add Video</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" required name="video" id="language"
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