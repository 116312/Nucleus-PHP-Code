@extends('admin.admin-app')
@section('title', 'Add Promotion Challenge')
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
                               Add Promotional Category Here
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-promo')}}" enctype="multipart/form-data">
                                @csrf
               <input type="hidden"  name="promo_type" value= "challenge" id="promo_type" class="form-control">
									<label for="article_category_type">Select Workout Category</label>
		                                <div class="form-group">
		                                    <div class="form-line">
		                                        <select class="form-control show-tick" required name="challenge_id" >
		                                            <option value="">-- Please select --</option>
		                                               @foreach($challenges as $key => $chall)
		                                                <option value="{{$chall->id}}">{{$chall->name}}&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;{{$chall->challengecategory->name}}</option>
                                                      @endforeach
		                                             
		                                        </select>
		                                    </div>
		                                </div>

                                          <label for="course_name">Promotion Challenge Image</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file"  name="promo_file" id="image"
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
