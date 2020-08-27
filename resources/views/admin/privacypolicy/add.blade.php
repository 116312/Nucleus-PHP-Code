@extends('admin.admin-app')
@section('title', 'Add Privacy Policy')
@section('admin-section')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Privacy Policy</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add Privacy Policy
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post"  id="form_validation" action="{{url('admin/store-privacy-policy')}}" enctype="multipart/form-data">
                                @csrf


                               
                                <label for="course_name">Add Privacy Policy</label>
                                <div class="form-group">
                                <div class="form-line">
                                <textarea id="ckeditor" name="description"></textarea>
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

@push('scripts')
<script type="text/javascript">
    $(function () {
        //CKEditor
        CKEDITOR.replace('ckeditor');
        CKEDITOR.config.height = 300;

    });
</script>
@endpush
@endsection