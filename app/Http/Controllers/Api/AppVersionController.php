<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Model\AppVersion;
use Carbon\Carbon;

class AppVersionController extends Controller
{
    public function saveAppVersion(Request $request){

          $data = [
        'device_type'=>$request->device_type,
        'version'=>$request->version,
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),

          ];
    	$check = AppVersion::where('device_type',$request->device_type)->first();

    	if($check != null){

AppVersion::where('device_type',$request->device_type)->update($data);
return Response::json(['code' => 200,'status' => true, 'message' => 'All categories','data'=>AppVersion::where('device_type',$request->device_type)->first()]);
    	}
else{

	$id= AppVersion::insertGetId($data);
return Response::json(['code' => 200,'status' => true, 'message' => 'All categories','data'=>AppVersion::find($id)]);
}

    	


    }
}
