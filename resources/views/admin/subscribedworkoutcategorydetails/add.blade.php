@extends('admin.admin-app')
@section('title', 'Add  Details')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Subscription Plan of Workout Category</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add Details Here ({{$subscribedcategory->subscriptionworkoutcategory->subscriptioncategory->name}} , {{$subscribedcategory->subscriptionworkoutcategory->workoutcategory->name}},{{$subscribedcategory->subscriptionplan->name}})
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-subscription-workout-category-details'.'/'.$sub_id)}}" enctype="multipart/form-data">
                                @csrf
                                
                             
                              <label for="course_name">Original Price (in dollars )</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="original_price" id="sequence_no"
                                               class="form-control">
                                    </div>
                                  </div>

                                   <label for="course_name">Plan Offer (in percentage)</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="offer_percentage" id="price"
                                               class="form-control">
                                    </div>
                                  </div>

                                   <label for="course_name">Plan Duration (in months)</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="number_of_month" id="price"
                                               class="form-control">
                                    </div>
                                  </div>



                                  <label for="course_name">Additional Benifits</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" required name="benifits[]" id="sequence_no"
                                               class="form-control">
                                    </div>
                                </div>

                                  <label for="course_name">Additional Benifits</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" required name="benifits[]" id="sequence_no"
                                               class="form-control">
                                    </div>
                                </div>

                                  <label for="course_name">Additional Benifits</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" required name="benifits[]" id="sequence_no"
                                               class="form-control">
                                    </div>
                                </div>

                                  <label for="course_name">Additional Benifits</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" required name="benifits[]" id="sequence_no"
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