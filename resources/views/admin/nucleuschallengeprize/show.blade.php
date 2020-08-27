@extends('admin.admin-app')
@section('title', 'Show All Prize Level')
@section('admin-section')
  
    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Nucleus Challenges</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Show All Prize
                            </h2>
                        </div>
                        <div class="body">



                             <table class="table table-bordered table-striped table-hover dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>Prize Level No.</td>
                                    <td>Prize title</td>
                                    <td>Prize Description</td>
                                    <td>Prize Image</td>
                                    <td>Action</td>

                                   

                                </tr>
                                </thead>
                                <tbody>
                                  
                                        @foreach($prizes as $key => $prize)
                                        <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$prize->title}}</td>
                                            <td>{{$prize->description}}</td>
                                          <td> <img style="float:left!important" src="{{$prize->image}}" height="100" width="100"></td>
                                         
                                            <form class="form-horizontal" method="post" action="{{url('admin/delete-nucleus-challenge-prize').'/'.$challenge_id.'/'.$prize->id}}" role="form">
                                    @csrf
                                 <td>
                                        <a href="{{url('admin/edit-nucleus-challenge-prize').'/'.$challenge_id.'/'.$prize->id}}"><button type="button" class="btn btn-primary waves-effect">Edit</button></a>
                                       
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
