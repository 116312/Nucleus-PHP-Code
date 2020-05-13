@extends('admin.admin-app')
@section('title', 'Add Workout Type')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Workout Type</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add New Workout Type Here
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-workout-details')}}" enctype="multipart/form-data">
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


                              <label for="course_name">Select Workout</label>
                               <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="selected_workout_id"required name="workout_id">
                                            <option value="">-- Please select --</option>
                                             
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
   

     var workout_type_id = '';
 $('#workout_type_id').change(function(){
            workout_type_id  = $("#workout_type_id option:selected").val();
            console.log(workout_type_id);
    

   $.ajax({

method: 'POST',
url: APP_URL + '/' + "admin/get_workouts"+"/"+workout_type_id,
data: {_token: token
},
cache: false,

success: function (response) {
   

   var workout = $('#select_workout_id');

  workout.empty(); 

 var x = JSON.stringify(response.workouts);

 
 var workout = document.getElementById('selected_workout_id');
      
              $(workout).append('<option>' + 'Select'+ '</option>');
    for (var i = 0; i < response.workouts.length; i++) {
    $(workout).append('<option id=' + response.workouts[i].sysid + ' value=' + response.workouts[i].id + '>' + response.workouts[i].name + '</option>');
   
    }


}

   });

   }); 


});
    </script>