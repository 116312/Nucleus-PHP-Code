@extends('admin.admin-app')
@section('title', 'Add Nucleus Challenge Prize')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Nucleus Challenge</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add New Prize Level
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-nucleus-challenge-prize/'.$challenge_id)}}" enctype="multipart/form-data">
                                @csrf


                               
                                 <label for="course_name">Add title of the Prize</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="title" id="language"
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

                                  <label for="course_name">Add Image Of Prize</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" required name="image" id="language"
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