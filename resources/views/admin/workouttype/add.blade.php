@extends('admin.admin-app')
@section('title', 'Add Workout Type')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Workout Type</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add New Workout Type Here
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-workout-type')}}" enctype="multipart/form-data">
                                @csrf


                                <label for="course_name">Workout Type Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="name" id="name"
                                               class="form-control">
                                    </div>
                                </div>
                                 <l]
                                 1abel for="course_name">Sequence Number</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" required name="sequence_no" id="sequence_no"
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