@extends('admin.admin-app')
@section('title', 'Workout Category')
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
                            <form method="post"  id="form_validation" action="{{url('admin/store-promo_cate')}}" enctype="multipart/form-data">
                                @csrf

									<label for="article_category_type">Select Type Of Promotion</label>
		                                <div class="form-group">
		                                    <div class="form-line">
		                                        <select class="form-control show-tick" required name="promotion_type" multiple>
		                                            <option value="">-- Please select --</option>
		                                            
		                                                <option value="category">Workout Category</option>
                                                        <option value="challenge">Nucleus Challenge</option>
                                                        <option value="video">Video</option>
		                                             
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
