@extends('admin.admin-app')
@section('title', 'Add Training Plan')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Training Plan</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add New  Plan Description Notes for {{$plan->name}}
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-plan-description').'/'.$plan->id}}" enctype="multipart/form-data">
                                @csrf
                           <label for="course_name">Add title of the Variation</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="name" id="language"
                                               class="form-control">
                                    </div>
                                </div>
          
                               
                                 <label for="course_name">Monday</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                      <select class="form-control show-tick" required name="monday" >
                                                    <option value="">-- Please select Workout Category--</option>
                                                     <option value="Rest">Rest</option>
                                                       @foreach($categories as $key => $cate)
                                                        <option value="{{$cate->name}}">{{$cate->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                    </div>
                                </div> <label for="course_name">Tuesday</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                      <select class="form-control show-tick" required name="tuesday" >
                                                    <option value="">-- Please select Workout Category--</option>
                                                     <option value="Rest">Rest</option>
                                                       @foreach($categories as $key => $cate)
                                                        <option value="{{$cate->name}}">{{$cate->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                    </div>
                                </div>
                                 <label for="course_name">Wednesday</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                      <select class="form-control show-tick" required name="wednesday" >
                                                    <option value="">-- Please select Workout Category--</option>
                                                     <option value="Rest">Rest</option>
                                                       @foreach($categories as $key => $cate)
                                                        <option value="{{$cate->name}}">{{$cate->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                    </div>
                                </div>
                                 <label for="course_name">Thursday</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                      <select class="form-control show-tick" required name="thursday" >
                                                    <option value="">-- Please select Workout Category--</option>
                                                     <option value="Rest">Rest</option>
                                                       @foreach($categories as $key => $cate)
                                                        <option value="{{$cate->name}}">{{$cate->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                    </div>
                                </div>
                                 <label for="course_name">Friday</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                      <select class="form-control show-tick" required name="friday" >
                                                    <option value="">-- Please select Workout Category--</option>
                                                     <option value="Rest">Rest</option>
                                                       @foreach($categories as $key => $cate)
                                                        <option value="{{$cate->name}}">{{$cate->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                    </div>
                                </div>
                                 <label for="course_name">Saturday</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                      <select class="form-control show-tick" required name="saturday" >
                                                    <option value="">-- Please select Workout Category--</option>
                                                     <option value="Rest">Rest</option>
                                                       @foreach($categories as $key => $cate)
                                                        <option value="{{$cate->name}}">{{$cate->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                    </div>
                                </div>
                                 <label for="course_name">Sunday</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                      <select class="form-control show-tick" required name="sunday" >
                                                    <option value="">-- Please select Workout Category--</option>
                                                     <option value="Rest">Rest</option>
                                                       @foreach($categories as $key => $cate)
                                                        <option value="{{$cate->name}}">{{$cate->name}}</option>
                                                      @endforeach
                                                     
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