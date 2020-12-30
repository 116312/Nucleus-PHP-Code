<?php

namespace App\Http\Controllers\Api;
use App\Mail\ForgotPasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Response;
use App\User;
use App\Model\UserSocialPrivacySetting;
use App\Model\UserTrainingType;
use App\Model\UserTrainingGoal;
use App\Model\UserDaysPerWeek;
use App\Model\UserPlanVariation;
use App\UserDevice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Storage;

class UserController extends Controller
{



    

    public function validateUser($data){
        $returnArray = [];
        
        $pass = $data->password;
        if($data->name == null){
            array_push($returnArray,'Please enter Username');
        }

        if($data->email == null){
            array_push($returnArray,'Please enter Email');
        }

        if($data->password == null){
            array_push($returnArray,'Please enter password');
        }






     

        
        return $returnArray;
    }







        public function register(Request $request){
          


        
        $validate  = $this->validateUser($request);

        if(count($validate) > 0){

            return Response::json(['codes' => 400,'status' => false, 'message' => "All fiels are required *"]);
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
                    'country'=>$request->country,
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
            return Response::json(['code' => 400,'status' => false, 'message' => 'User not register']);
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
                
                     return Response::json(['code' => 200,'status' => true, 'message' => 'User login successfully','data'=>$check]);
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





    public function updateprofile(Request $request){

     
        $imagePath = '';

         if($request->hasFile('image')){
          
            $ext = $request->image->getClientOriginalExtension();
            $path = Storage::putFileAs('users', $request->image,time().uniqid().".".$ext);

            $imagePath = $path;
    
          User::where('id',$request->user_id)->update(['image'=>$imagePath]);
          }



        $data = [
         'name' => $request->name,
         'contact_no' => $request->contact_no, 
         'gender'=> $request->gender,
         'weight'=> $request->weight, 
         'weight_unit'=>$request->weight_unit,
         'height_unit'=>$request->height_unit,
         'height'=>$request->height,
         'dob'=>$request->dob,
         'country'=>$request->country,
         'updated_at'=>Carbon::now(),
          ];

       User::where('id',$request->user_id)->update($data);
       
       $data = User::where('id',$request->user_id)->first();

        return Response::json(['code' => 200,'status' => true, 'message' => 'User data updated successfully','data'=>$data]);


    }



    public function getprofile(Request $request){

    $profile =  User::where('id',$request->user_id)->first();
    $UserSubscriptionDetails = UserSubscriptionDetails::where('user_id',$request->user_id)->first();
    //date:-30-12-2020 By :-Mishra Ankit Kumar
    $type =UserTrainingType::where('user_id',$request->user_id)->first();
    $goal =UserTrainingGoal::where('user_id',$request->user_id)->first();
    $daysperweek = UserDaysPerWeek::where('user_id',$request->user_id)->first();
    $planvariationdata = UserPlanVariation::where('user_id',$request->user_id)->first();

    $planData = [
    'type' =>$type,
    'goal'=>$goal,
    'daysperweek'=>$daysperweek,
    'planvariationdata'=>$planvariationdata,


    ];

    
    return Response::json(['code' => 200,'status' => true, 'message' => 'Get User PRofile data','data'=>$profile,"UserSubscriptionDetails"=>$UserSubscriptionDetails,"planData"=>$planData]);

    }


       public function forgotPassword(Request $request){


        
        $user = User::where('email',$request->email)->first();



        if($user == null){
            return Response::json(['code' => 400,'status' => false, 'message' => 'User not register']);
        }
        else{
            $token = \Illuminate\Support\Str::random(4);
            $user->token = $token;
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return Response::json(['code' => 200,'status' => true, 'message' => 'Reset password link sent successfully to register email address','data'=>$user]);
        }
    }



    public function resetPassword(Request $request){

          $user = User::where('id',$request->user_id)->first();
          
          if($user == null){
            return Response::json(['code' => 400,'status' => false, 'message' => 'User not register']);
        } 


        if($user->token != $request->otp){
 
         return Response::json(['code' => 400,'status' => false, 'message' => 'OTP does not macthed']);
        }

        else{
        
            $user->password =  bcrypt($request->password);
            $user->save();
         
            return Response::json(['code' => 200,'status' => true, 'message' => 'Password is successfully set']);
        }

    }




    public function submitsocialprivacysettings(Request $request){
      

      $isalreadyexist = UserSocialPrivacySetting::where('user_id',$request->user_id)->first();
      $data = [
      
      'user_id'=>$request->user_id,
      'name'=>$request->name,
      'gender'=>$request->gender,
      'age'=>$request->age,
      'height'=>$request->height,
      'weight'=>$request->weight,
      'email'=>$request->email,
      'images_videos'=>$request->images_videos,
      'workout_result'=>$request->workout_result,



      ];


    
      if($isalreadyexist != null){
      
      UserSocialPrivacySetting::where('user_id',$request->user_id)->update($data);


      }


      else{

          UserSocialPrivacySetting::insert($data);


      }


      $data = UserSocialPrivacySetting::where('user_id',$request->user_id)->first();

    return Response::json(['code' => 200,'status' => true, 'message' => 'Privacy Setting Saved Successfully','data'=>$data]);


    }


    public function getuserssocialprivacysetting(Request $request){

     $data = UserSocialPrivacySetting::where('user_id',$request->user_id)->first();

    return Response::json(['code' => 200,'status' => true, 'message' => 'Privacy Setting Saved Successfully','data'=>$data]);


    }
}
