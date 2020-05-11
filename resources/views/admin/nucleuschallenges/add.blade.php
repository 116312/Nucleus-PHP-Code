@extends('admin.admin-app')
@section('title', 'Nucleus Challenge')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Nucelus Challenges</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Add New Nucleus Challenge
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-nuc-chall')}}" enctype="multipart/form-data">
                                @csrf

									<label for="article_category_type">Select Challenge Category</label>
		                                <div class="form-group">
		                                    <div class="form-line">
		                                        <select class="form-control show-tick" required name="challenge_category_id">
		                                            <option value="">-- Please select --</option>
		                                              @foreach($challenges_categories as $key => $cate)
                                                       <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                       @endforeach
		                                              
		                                             
		                                        </select>
		                                    </div>
		                                </div>


                                <label for="course_name">Add Name of Challenge</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="name" id="name"
                                               class="form-control">
                                    </div>
                                </div>

                                <label for="course_name">Days Per Week</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="days_per_week" id="name"
                                               class="form-control">
                                    </div>
                                </div>


                                <label for="course_name">Number of  Weeks</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="number_of_weeks" id="name"
                                               class="form-control">
                                    </div>
                                </div>
                                 <label for="course_name">Season</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="season" id="name"
                                               class="form-control">
                                    </div>
                                </div>

                                <label for="course_name">Add Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea type="text" row = "4" required name="description" id="description"
                                               class="form-control"> </textarea> 
                                    </div>
                                </div>


                                <label for="course_name">Add Points</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="points" id="points"
                                               class="form-control">
                                    </div>
                                </div>

                                  <label for="course_name">Add Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" required name="image" id="image"
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
