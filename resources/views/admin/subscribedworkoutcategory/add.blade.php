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
                            <form method="post"  id="form_validation" action="{{url('admin/store-subscription-workout-category')}}" enctype="multipart/form-data">
                                @csrf
                                
                              <label for="course_name">Select Subscription Category</label>
                               <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="workout_type_id"required name="subscription_category_id">
                                            <option value="">-- Please select --</option>
                                               @foreach($subscriptioncategory as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                @endforeach
                                            
                                        </select>
                                    </div>
                                </div>


                                <label for="article_category_type">Select Subscription Plan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="subscription_plan_id" >
                                                    <option value="">-- Please select --</option>
                                                       @foreach($subscriptionplans as $key => $plan)
                                                        <option value="{{$plan->id}}">{{$plan->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                            </div>
                                        </div>
                                 <label for="article_category_type">Select Workout Category</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="categories_id" >
                                                    <option value="">-- Please select --</option>
                                                       @foreach($workoutcategories as $key => $categories)
                                                        <option value="{{$categories->id}}">{{$categories->name}}</option>
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