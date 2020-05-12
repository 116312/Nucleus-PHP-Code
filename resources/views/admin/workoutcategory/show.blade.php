@extends('admin.admin-app')
@section('title', 'Show All Catgeory')
@section('admin-section')
    <style type="text/css">
        #all-user-datatable_wrapper{
            width: 100%;
            overflow: auto;
        }
    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Users</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show Users
                            </h2>
                        </div>
                        <div class="body">



                            <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Category Name</td>
                                    <td>Type</td>
                                    <td>Sequence Number</td>
                                    <td>Image for Male</td>
                                    <td>Image for Female</td>
                                    <td>Image for Unspecified</td>
                                    <td>Action</td>

                                   

                                </tr>
                                </thead>
                                <tbody>
                               @foreach($categories as $key => $cate)
                                   <tr>
                                       <td>{{$key + 1}}</td>
                                       <td>{{$cate->name}}</td>
                                        <td>{{$cate->type}}</td>
                                       <td>{{$cate->sequence_no}}</td>
                                       <td><img style="float:left!important" src="{{$cate->malecategoryimage->image}}" height="100" width="100"></td>
                                        <td><img style="float:left!important" src="{{$cate->femalecategoryimage->image}}" height="100" width="100"></td>
                                        <td><img style="float:left!important" src="{{$cate->unspecifiedcategoryimage->image}}" height="100" width="100"></td>
                                          <form class="form-horizontal" method="post" action="{{url('admin/delete-cate').'/'.$cate->id}}" role="form">
                                    @csrf
                                 <td>
                                        <a href="{{url('admin/edit-cate').'/'.$cate->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                        <a href="" onclick="return confirm('Are you sure you want to delete this item?');"><button type="submit" class="btn btn-danger waves-effect">Delete</button></a>
                                    </td>
                                </form>
                                      

                                   </tr>
                               @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
