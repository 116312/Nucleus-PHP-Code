@extends('admin.admin-app')
@section('title', 'Edit Quick Clips Details')
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
                               Add Details
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/update-quick-clips_details').'/'.$clip_id.'/'.$quickclipdetail->id}}" enctype="multipart/form-data">
                                @csrf


                            <label for="course_name">Select Voice Guidance Type</label>    
                                <div class="form-group">
                                  <div class="form-line">
                                  <select class="form-control show-tick" required name="voice_guidance_type_id" >
                                    <option value="">--select--</option>
                                    @foreach($voice_guidance_type as $key => $type)
                                    <option value="{{$type->id}}" {{$quickclipdetail->voiceguidancetype->id == $type->id ? 'selected':''}} >{{$type->name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              </div>
                            
                            <label for="course_name">Select Language</label>
                                <div class="form-group">
                                  <div class="form-line">
                                  <select class="form-control show-tick" required name="language_id" >
                                    <option value="">--select--</option>
                                    @foreach($languages as $key => $language)
                                    <option value="{{$language->id}}" {{$quickclipdetail->language->id == $language->id ? 'selected':''}} >{{$language->name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                             
<div class="form-group">
                                    <div class="form-line">
                          <video id="myvideo" width="320" height="240" controls muted>
                          <source src="{{$quickclipdetail->quickclips->clip}}" type="video/mp4" />
                          <track label="{{$quickclipdetail->language->name}}" kind="subtitles" srclang="en" src="{{$quickclipdetail->subtitle}}" default>
                          <audio id="myaudio" controls>
                          <source src="{{$quickclipdetail->audio}}" type="audio/mpeg"/>
                          </audio>
                          </video>
                           
</div>
</div>



                            
                            <label for="course_name">Add Audio(supports .wav format)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file"  name="audio" id="language"
                                               class="form-control">
                                    </div>
                            </div>
                            
                            <label for="course_name">Add Subtitle(supports .vtt format)</label>
                             <div class="form-group">
                                    <div class="form-line">
                                        <input type="file"  name="subtitle" id="language"
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