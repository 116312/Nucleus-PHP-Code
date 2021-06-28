@extends('admin.admin-app')
@section('title', 'Assign Subscription')
@section('admin-section')
<style>
    .page-loader-wrapper {
    display: none;
}
    </style>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Assign Subscription</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Assign Subscription
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/add-assign-subscription/')}}/{{$userId}}" enctype="multipart/form-data">
                                @csrf


                               
                         <label for="course_name">Select Subscription Category</label>
                               <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="workout_type_id"required name="subscriptionCategoryId">
                                            <option value="">-- Please select --</option>
                                               @foreach($subscription_category as $cate)
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                @endforeach
                                            
                                        </select>
                                    </div>
                                </div>


                         <label for="article_category_type">Select Subscription Plan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="subscriptionPlanId" >
                                                    <option value="">-- Please select --</option>
                                                       @foreach($subscription_plan as $key => $plan)
                                                        <option value="{{$plan->id}}">{{$plan->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                            </div>
                                        </div>

                        <label for="course_name">How many day you want to give Subscription</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="number" required name="days" id="image"
                                                           class="form-control" min="1" max="365">
                                                </div>
                                            </div>

                       <button type="submit" name="addAssignSubscription" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
