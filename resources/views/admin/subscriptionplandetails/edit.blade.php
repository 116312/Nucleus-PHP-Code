@extends('admin.admin-app')
@section('title', 'Edit Subscription Plan Details')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Subscription Plan Details</h2>
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
                            <form method="post"  id="form_validation" action="{{url('admin/update-subscription-plan-details'.'/'.$subscriptionplandetails->id)}}" enctype="multipart/form-data">
                                @csrf
                                
                              <label for="course_name">Select Subscription Category</label>
                               <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control show-tick" id="workout_type_id"required name="subscription_category_id">
                                            <option value="">-- Please select --</option>
                                               @foreach($subscription_category as $cate)
                                                <option value="{{$cate->id}}" {{$cate->id == $subscriptionplandetails->subscription_category_id ? 'selected':''}}>{{$cate->name}}</option>
                                                @endforeach
                                            
                                        </select>
                                    </div>
                                </div>


                                <label for="article_category_type">Select Subscription Plan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" required name="subscription_plan_id" >
                                                    <option value="">-- Please select --</option>
                                                       @foreach($subscription_plan as $key => $plan)
                                                        <option value="{{$plan->id}}" {{$plan->id == $subscriptionplandetails->subscription_plan_id ? 'selected':''}}>{{$plan->name}}</option>
                                                      @endforeach
                                                     
                                                </select>
                                            </div>
                                        </div>

                                  <label for="course_name">Product Id</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="product_id" id="sequence_no"  value="{{$subscriptionplandetails->product_id}}"
                                               class="form-control">
                                    </div>
                                  </div>

                                           <label for="course_name">Original Price (in dollars )</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="original_price" id="sequence_no"
                                          value = "{{$subscriptionplandetails->original_price}}"     class="form-control">
                                    </div>
                                  </div>

                                   <label for="course_name">Plan Offer (in percentage)</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="offer_percentage" id="price"
                                             value = "{{$subscriptionplandetails->offer_percentage}}"    class="form-control">
                                    </div>
                                  </div>

                                   <label for="course_name">Plan Duration (in months)</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="number_of_month" id="price"
                                           value = "{{$subscriptionplandetails->number_of_month}}"    class="form-control">
                                    </div>
                                  </div>
@if($subscriptionplandetails->additionalbenifits->count() != null)
@foreach($subscriptionplandetails->additionalbenifits as $benifits)

                                  <label for="course_name">Additional Benifits</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <input type="text" required name="benifits[]" id="sequence_no"
                                         value="{{$benifits->benifits}}"      class="form-control">
                                    </div>
                                </div>

         @endforeach     


         @else

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
                                @endif                   
                                
                             <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
     </section>

@endsection 