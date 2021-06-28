@extends('admin.admin-app')
@section('title', 'All Subscribed Users')
@section('admin-section')
    <style type="text/css">
        #all-user-datatable_wrapper , .over-flow_table{
            width: 100%;
            overflow: auto;
        }
         .page-loader-wrapper{display:none;}
    </style>
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Subscribed Users</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card over-flow_table">
                        <div class="header">
                            <h2>
                                Show Subscribed Users
                            </h2>
                            
                            
                        </div>
                        <div class="body">
                       <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="all-user-datatable">
                                <thead>
                                <tr>
                                    <td>S No.</td>
                                    <td>User Name</td>
                                    <td>Registered Date</td>
                                    <td>Mobile Number</td>
                                    <td>Country</td>
                                    <td>Email</td>
                                    <td>Gender</td>
                                    <td>Product </td>
                                    <td>Subscription Date</td>
                                    <td>Payment ID </td>
                                    <td>Transaction ID</td>
                                    <td>Amount</td>
                                    <td>Device Type</td>
                                    <td>Subscription Category</td>
                                    <td>Subscription Plan </td>
                                    <td>Start Date </td>
                                    <td>End Date </td>
                                    <td>Subscription Staus</td>
                                    <td>Action</td>
                                </tr>
                                </thead>
                                <tbody>
                             @foreach($users as $key => $user)
                             @php
                             $subscriptionId=$user->subscriptionId;
                             $subscriptionPlanData=\App\Model\UserSubscriptionPlanDetails::where('user_subscription_id',$subscriptionId)->first();
                             $subscription_category_id=$subscriptionPlanData->subscription_category_id;
                             $subscription_plan_id=$subscriptionPlanData->subscription_plan_id;
                             @endphp
                            
                               <tr>
                                       <td>{{$key + 1}}</td>
                                       <td>{{$user->name}}</td>
                                       <td>{{$user->created_at}}</td>
                                       <td>{{$user->contact_no}}</td>
                                       <td>{{$user->country}}</td>
                                       <td>{{$user->email}}</td>
                                       <td>{{$user->gender}}</td>
                                       <td>{{$user->product}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->payment_id}}</td>
                                        <td>{{$user->transaction_id}}</td>
                                        <td>{{$user->amount}}</td>
                                        <td>{{$user->Device_Type}}</td>
                                        <td>{{\App\Model\SubscriptionPlan::where('id',$subscription_category_id)->first()->name}}</td>
                                        <td>{{\App\Model\SubscriptionPlan::where('id',$subscription_plan_id)->first()->name}}</td>
                                        <td>{{ $subscriptionPlanData->start_date }}</td>
                                        <td>{{ $subscriptionPlanData->end_date }}</td>
                                         <td>
                                             @if($subscriptionPlanData->status ==1)   
          <button style"color:green" type="submit" class="btn btn-sucess waves-effect">Activate</button>
          @else
          <button type="submit" class="btn btn-danger waves-effect">Deactivate</button>
          @endif
                                     
                                         
                                    </td>
                                   <td>
                                       
                                    <!--<a href="{{url('admin/user-view-detail').'/'.$subscriptionId}}"--></a><button data-toggle="modal" data-target="#detail" data-backdrop="static" data-keyboard="false" type="button" class="btn btn-success waves-effect">View Detail</button>
                                       
                                   </td>
                               
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
    
 <div id="detail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Subscribed Prime Video</h4>
      </div>
      <div class="modal-body">
       <table class="table table-bordered table-striped table-hover dataTable">
  <thead>
    <tr>
      <td>S No.</td>
      <td>Video  Name</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Cuerpo entero especial Abdomen with Diego Calvo</td>
      <td>
        <button type="submit" class="btn btn-danger waves-effect">Deactivated</button>
        </td>
    </tr>
    <tr>
      <td>2</td>
      <td>Cuerpo entero con Diego Calvo</td>
      <td>
        <button type="submit" class="btn btn-danger waves-effect">Deactivated</button>
       </td>
    </tr>
    <tr>
      <td>3</td>
      <td>Full Body with Cristina Chan</td>
      <td>
        <button type="submit" class="btn btn-danger waves-effect">Deactivated</button>
        </td>
    </tr>
    <tr>
      <td>4</td>
      <td>Full Body Core Killer with Cristina Chan</td>
      <td>
        <button type="submit" class="btn btn-danger waves-effect">Deactivated</button>
       </td>
    </tr>
    <tr>
      <td>5</td>
      <td>Upper Body Blast with Isaac Dotson</td>
      <td>
        <button type="submit" class="btn btn-danger waves-effect">Deactivated</button>
        </td>
    </tr>
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
    $(function(){
    $("#all-user-datatable").dataTable();
  })
  </script>
    

@endsection
