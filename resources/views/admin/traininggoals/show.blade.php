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

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($goals as $key => $goal)
                                        <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$goal->title}}</td>
                                         <td>{{$goal->description}}</td>
                                         <td><ul>
                                             @foreach($goal->traininggoalsplan as $key =>$plans)
                                           
                                             <li>{{$plans->trainingplan->name}}</li>
                                          
                                             @endforeach
                                         </ul></td>
                                            
                                      
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