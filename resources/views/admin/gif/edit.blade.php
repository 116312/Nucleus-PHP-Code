@extends('admin.admin-app')
@section('title', 'Add Gif')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Gif</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add New Gif
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/update-gif').'/'.$gif->id}}" enctype="multipart/form-data">
                                @csrf


                               
                                 <label for="course_name">Add title of the Gif</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="name" value = "{{$gif->name}}" id="language"
                                               class="form-control">
                                    </div>
                                </div>
                                 <label for="course_name">Add Gif</label>
                                <div class="form-group">
                                    <div class="form-line">
                                          <img src="{{$gif->gif}}" height="100" width="100">
                                        <input type="file" required name="gif" id="language"
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