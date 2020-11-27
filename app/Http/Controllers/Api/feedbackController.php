<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Response;
use App\User;
use App\Model\feedback;
use DB;

use Illuminate\Support\Facades\Validator;
class feedbackController extends Controller
{
    public function feedback(Request $request){
        
        $validation = array(
            "from" =>'required',
            "to" =>'required',
            "subject" =>'required',
            "content" =>'required',
         
        );
        $validator = Validator::make($request->all(),$validation);
        if ($validator->fails()) {
            $response['message']=$validator->errors($validator)->first();
            return Response::json($response,400);
        }
  $data  = new  feedback();
  $data->from =$request->from;
  $data->to =$request->to;
  $data->subject =$request->subject;
  $data->content =$request->content;
  $data->save();

  return response()->json(["message"=>"feedback receive successfully",'data'=> $data]);

    }
    
}
