@extends('admin.admin-app')
@section('title', 'Show Privacy Policy')
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
                                Show Privacy Policy
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Terms and Conditions</td>
                                     <td></td>

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        
                                        <tr>
                                          <td>1</td>
                                          <td>{!!$policy->description!!}</td>
                                         
                                            <form class="form-horizontal" method="post" action="{{url('admin/delete-privacy-policy').'/'.$policy->id}}" role="form">
                                    @csrf
                                 <td>
                                      <div class="action_btn">
                                        <a href="{{url('admin/edit-privacy-policy').'/'.$policy->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                       
                                        <a href="" onclick="return confirm('Are you sure you want to delete this item?');"><button type="submit" class="btn btn-danger waves-effect">Delete</button></a>
                                        </div>
                                    </td>
                                </form>
                                      
                                         </tr>
                                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
