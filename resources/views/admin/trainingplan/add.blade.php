@extends('admin.admin-app')
@section('title', 'Add Training Plan')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Training Plan</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add New Training Plan
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-training-plan')}}" enctype="multipart/form-data">
                               {{csrf_field()}}


                               
                                 <label for="course_name">Add title of the Traing Plan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="name" id="language"
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