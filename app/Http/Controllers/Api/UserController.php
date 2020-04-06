<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\User;
use App\UserDevice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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











    public function login(Request $request){
        $user = User::where('email',$request->email)->first();

        if($user == null){
            return Response::json(['code' => 400,'status' => false, 'message' => 'User not register','data'=>[]]);
        }
        else{
            if(Hash::check($request->password, $user->password)){
                $devices = $user->userDevices()->get();
                if($devices->count() < 2){
                    $check_device = $devices->firstWhere('device_id',$request->device_id);
                    if($check_device != null){
                        return Response::json(['code' => 200,'status' => true, 'message' => 'User login successfully','data'=>$user]);
                    }
                    else{
                        UserDevice::insert(['user_id' => $user->id,'device_id' => $request->device_id,'created_at' =>Carbon::now()]);
                        return Response::json(['code' => 200,'status' => true, 'message' => 'User login successfully','data'=>$user]);
                    }
                }
                else{
                    $check_device = $devices->firstWhere('device_id',$request->device_id);
                    if($check_device != null){
                        return Response::json(['code' => 200,'status' => true, 'message' => 'User login successfully','data'=>$user]);
                    }
                    else{

                        return Response::json(['code' => 200,'status' => true, 'message' => 'User login un-successfully for security reason','data'=>[]]);
                    }
                }


            }
            else{
                return Response::json(['code' => 400,'status' => false, 'message' => 'Invalid email or password']);
            }
        }
    }




     public function socialLogin(Request $request){
        $check = User::where('provider_id',$request->provider_id)->first();

        if($check != null){
            $devices = $check->userDevices()->get();
            if($devices->count() < 2){
                $check_device = $devices->firstWhere('device_id',$request->device_id);
                if($check_device != null){
                    return Response::json(['code' => 200,'status' => true, 'message' => 'User login successfully','data'=>$check]);
                }
                else{
                    UserDevice::insert(['user_id' => $check->id,'device_id' => $request->device_id,'created_at' =>Carbon::now()]);
                    return Response::json(['code' => 200,'status' => true, 'message' => 'User login successfully','data'=>$check]);
                }
            }
            else{
                $check_device = $devices->firstWhere('device_id',$request->device_id);
                if($check_device != null){
                    return Response::json(['code' => 200,'status' => true, 'message' => 'User login successfully','data'=>$check]);
                }
                else{

                    return Response::json(['code' => 200,'status' => true, 'message' => 'User login un-successfully for security reason','data'=>[]]);
                }
            }

        }
        else{

          if($request->email != null){
                $check = User::where('email',$request->email)->first();
                if($check != null){
                    return Response::json(['code' => 400,'status' => false, 'message' => 'Validation Error','data'=>['User Already Exist']]);
                }
          }
            $insert = [
                'name' => $request->name,
                'email' => $request->email,
                'provider' => $request->provider,
                'provider_id' => $request->provider_id,
                'created_at' => Carbon::now(),
            ];

            $id = User::insertGetId($insert);
            UserDevice::insert(['user_id' => $id,'device_id' => $request->device_id,'created_at' =>Carbon::now()]);
            $user = User::find($id);
            return Response::json(['code' => 200,'status' => true, 'message' => 'User register successfully','data'=>$user]);
        }
    }
}
