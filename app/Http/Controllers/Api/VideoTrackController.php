<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\VideoView;
use Carbon\Carbon;

class VideoTrackController extends Controller
{
    /**
     * view function use for Video View According to User Id
     * @param:-videoId | use for Video id
     * @param:-userId | use for login user id
     * @param:-viewStatus | Status for Video is completed or Not
     * @param:-viewDate | use for View Date
     * @return JSON
     */
    public function view(Request $request)
    {
      $videoId=$request->input("videoId");
      $userId=$request->input("userId");
      $totalWatchDuration=$request->input("totalWatchDuration");
      $viewStatus=$request->input("viewStatus");
      $viewDate=Carbon::now();
      $data=VideoView::checkVideoView($videoId,$userId);
      if(empty($data))
      {
      $totalVideoDuration=$request->input("totalVideoDuration");
      $result=VideoView::addVideoView($videoId,$userId,$viewStatus,$viewDate,$totalWatchDuration,$totalVideoDuration);
      }
      else
      {
          $id=$data->id;
          $result=VideoView::updateVideoView($viewStatus,$viewDate,$totalWatchDuration,$id);
          return response()->json(array('status'=>"200",'message'=>"successfully"),200);
          
      }
      
     
    }
}
