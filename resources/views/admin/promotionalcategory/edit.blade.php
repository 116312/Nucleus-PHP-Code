@extends('admin.admin-app')
@section('title', 'Edit Promotional Category')
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
                               Edit Promotional Category Here
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/update-promo_cate').'/'.$promotionalcategory->id}}" enctype="multipart/form-data">
                                @csrf

									<label for="article_category_type">Workout Category</label>
		                                <div class="form-group">
		                                    <div class="form-line">
		                                        <select class="form-control show-tick" required name="category_id">
		                                            <option value="">-- Please select --</option>
		                                            @foreach($categories as $key =>$cate)
		                                                <option  {{$promotionalcategory->category->id == $cate->id ? 'selected':''}} value="{{$cate->id}}">{{$cate->name}}</option>
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
