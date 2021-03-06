@extends('admin.admin-app')
@section('title', 'Add Premium Workkout Details')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Premium Workout</h2>
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
                            <form method="post"  id="form_validation" action="{{url('admin/store-premium-workout-details')}}" enctype="multipart/form-data">
                                @csrf
                                
                              <label for="course_name">Select Workout Type</label>
                               <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="workout_type_id"required name="workout_type_id">
                                            <option value="">-- Please select --</option>
                                               @foreach($workout_types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            
                                        </select>
                                    </div>
                                </div>


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
                                         <label for="article_category_type">Select Video Free/Paid</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="IsPaid" >
                                                    <option value="">-- Please select --</option>
                                                      
                                                        <option value="1">Paid</option>
                                                        <option value="0">Free</option>
                                                    
                                                     
                                                </select>
                                            </div>
                                        </div>
                                        
                                 <label for="article_category_type">Select Workout</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="premium_workout_id" >
                                                    <option value="">-- Please select --</option>
                                                       @foreach($premium_videos as $key => $videos)
                                                        <option value="{{$videos->id}}">{{$videos->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                            </div>
                                        </div>

                                



                               
                                 <label for="course_name">Add Workout Level</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="workout_level" id="sequence_no"
                                               class="form-control">
                                    </div>
                                  </div>

                                   <label for="course_name">Add Price (in dollars)</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="price" id="price"
                                               class="form-control">
                                    </div>
                                  </div>



                                  <label for="course_name">Add Trainer Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" required name="trainer_name" id="sequence_no"
                                               class="form-control">
                                    </div>
                                </div>



                              
                               
                                 <label for="course_name">Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" required name="image" id="sequence_no"
                                               class="form-control">
                                    </div>
                                </div>

                                  <label for="course_name">Add Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea type="text" row = "2" required name="description" id="description"
                                               class="form-control"> </textarea> 
                                    </div>
                                </div>

                            
                                
                            <label for="article_category_type">Chapters</label>
      <div class="form-group">
      <div id="wrapper">
     
      </div>
       <span><button type="button" id ="add" class="btn btn-primary m-t-15 waves-effect">Add Chapters</button></span>
      </div>
                               
                          

                                
                               


                                
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
      $(document).ready(function(){

       $("#add").click(function (e) {
//Append a new row of code to the "#items" div
  $("#wrapper").append('<div class="added_chapter form-line"><input type="text" name="chapters[]" class="form-control" style="width:100%!important;" ><button  class="delete">Delete</button></div><br />');
});
        $("#wrapper").on("click",".delete", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
    })
});
    </script>@endsection