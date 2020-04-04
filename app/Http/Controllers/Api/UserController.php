<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\User;
use App\UserDevice;
use Carbon\Carbon;

class UserController extends Controller
{



    

    public function validateUser($data){
        $returnArray = [];
        if($data->name == null){
            array_push($returnArray,'Please enter Username');
        }

        if($data->email == null){
            array_push($returnArray,'Please enter Email');
        }

        if($data->password == null){
            array_push($returnArray,'Please enter password');
        }

        if($data->contact_no == null){
            array_push($returnArray,'Please enter phone number');
        }

        
        return $returnArray;
    }







        public function register(Request $request){
          


        
        $validate  = $this->validateUser($request);

        if(count($validate) > 0){

            return Response::json(['codes' => 400,'status' => false, 'message' => 'All * fields are required']);
        }
        else{

            $check = User::where('email',$request->email)->first();

            if($check != null){

                return Response::json(['code' => 400,'status' => false, 'message' => 'User Already Exist']);
            }
            else{

                $insert = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'contact_no' => $request->contact_no,
                   
                    'created_at' => Carbon::now(),
                ];

               $id = User::insertGetId($insert);
                UserDevice::insert(['user_id' => $id,'device_id' => $request->device_id,'created_at' =>Carbon::now()]);
                $user = User::find($id);
                return Response::json(['code' => 200,'status' => true, 'message' => 'User register successfully','data'=>$user]);
            }

        }
    
    }
}
