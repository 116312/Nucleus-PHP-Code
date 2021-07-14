@extends('admin.admin-app')
@section('title', 'Edit Workout Category')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Workout Category</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Edit Workout Category Here
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/update-cate').'/'.$category->id}}" enctype="multipart/form-data">
                                @csrf


                                <label for="course_name">Category Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="name"  value = "{{$category->name}}" id="category_name"
                                               class="form-control">
                                    </div>
                                </div>

                                  <label for="course_name">Category Type</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" required name="type">
                                                    <option value="">-- Please select --</option>
                                                  
                                                       <option value="workout" {{$category->type== 'workout' ? 'selected':''}}>Workout</option>
                                                          <option value="other"{{$category->type== 'other' ? 'selected':''}}>Other</option>
                                                   
                                                      
                                                     
                                        </select>
                                    </div>
                                </div>
                                <label for="course_name">Category Sequence Number</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="sequence_number" value = "{{$category->sequence_no}}" id="sequence_number"
                                               class="form-control">
                                    </div>
                                </div>
                                 <label for="course_name">Female Category Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                           <img src="{{$category->femalecategoryimage->image}}" height="100" width="100">
        
                   
                                        <input type="file"  name="female_image" id="female_image"
                                               class="form-control">
                                    </div>
                                </div>
                                 <label for="course_name">Male Category Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <img src="{{$category->malecategoryimage->image}}" height="100" width="100">
                                        <input type="file"  name="male_image" id="male_image"
                                               class="form-control">
                                    </div>
                                </div>

                                 <label for="course_name">Unspecified Category Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <img src="{{$category->unspecifiedcategoryimage->image}}" height="100" width="100">
                                        <input type="file"  name="unspecified_image" id="male_image"
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
