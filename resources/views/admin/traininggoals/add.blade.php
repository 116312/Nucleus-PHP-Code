@extends('admin.admin-app')
@section('title', 'Add Training Goals')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Training Goals</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add New Training Goal
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-training-goals')}}" enctype="multipart/form-data">
                                @csrf


                               
                                 <label for="course_name">Add title of the Training Goals</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="title" id="language"
                                               class="form-control">
                                    </div>
                                </div>


                                  <label for="course_name">Add Description for Training Goals</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea type="text"  row="6" required name="description" id="language"
                                               class="form-control"></textarea> 
                                    </div>
                                </div>
                               <label for="article_category_type">Select Days Per Week Training Plan</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select multiple class="form-control show-tick" required name="training_plan_id[]">
                                                    <option value="">-- Please select --</option>
                                                      @foreach($daysperweek as $key => $cate)
                                                       <option value="{{$cate->id}}">{{$cate->name}}</option>
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