@extends('admin.admin-app')
@section('title', 'Show All Training Goals')
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
                                Show videos
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>Title</td>
                                    <td>Description</td>
                                    <td>Days Per Week</td>
                                    <td>Action</td>

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($goals as $key => $goal)
                                        <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$goal->title}}</td>

                                         <td>@if($goal->descriptions != null)
                                         @foreach($goal->descriptions as $desc)

                                            <li>{{$desc->descriptions}}</li>
                                         @endforeach
                                         @endif</td>
                                         <td><ul>
                                             @foreach($goal->traininggoalsplan as $key =>$plans)
                                           
                                             <li>{{$plans->trainingplan->name}}</li>
                                          
                                             @endforeach
                                         </ul></td>
                                              <form class="form-horizontal" method="post" action="{{url('admin/delete-training-goals').'/'.$goal->id}}" role="form">
                                    @csrf
                                        <td>
                                        <a href="{{url('admin/edit-training-goals').'/'.$goal->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                      
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