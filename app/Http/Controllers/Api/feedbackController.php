use Response;
use App\User;
use App\Model\feedback;
use Mail;
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
        Mail::send([], [], function ($message) use($request) {
            $message->to($request->to)
              ->subject($request->subject)
              // here comes what you want
              ->setBody($request->content); // assuming text/plain
          });
  $data  = new  feedback();
  $data->from =$request->from;
  $data->to =$request->to;
  $data->subject =$request->subject;
  $data->content =$request->content;
  $data->save();

  return response()->json(["message"=>"feedback receive successfully",'data'=> $data]);

    }
    
}