@extends('admin.admin-app')
@section('title', 'Show All Users')
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
                                    <td>Sequence Number</td>
                                    <td>Image for Male</td>
                                    <td>Image for FeMale</td>
                                   

                                </tr>
                                </thead>
                                <tbody>
                               @foreach($categories as $key => $cate)
                                   <tr>
                                       <td>{{$key + 1}}</td>
                                       <td>{{$cate->name}}</td>
                                       <td>{{$cate->sequence_no}}</td>
                                       <td><img style="float:left!important" src="{{$cate->malecategoryimage->image}}" height="100" width="100"></td>
                                        <td><img style="float:left!important" src="{{$cate->femalecategoryimage->image}}" height="100" width="100"></td>
                                      

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
