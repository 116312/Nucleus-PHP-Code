@extends('admin.admin-app')
@section('title', 'Edit Voice Guidance Type')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Voice Guidance Type</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Edit Voice Guidance Level Type
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/update-voice-guidance-type').'/'.$voice_guidance_type->id}}" enctype="multipart/form-data">
                                @csrf


                               
                                 <label for="course_name">Voice Guidance Type Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="name" value ="{{$voice_guidance_type->name}}" id="name"
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