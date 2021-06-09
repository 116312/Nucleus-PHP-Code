<?php
namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;
class VideoView extends Model
{
     protected $table ='video_views';
     protected $primaryKey = 'id';
      /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'video_id' => "",
        'user_id' => "",
        'view_date' => "",
        'view_status' => "",
        'total_watch_duration' =>"",
        'total_video_duration'=>""
    ];
    /**
     * view function use for Video View According to User Id
     * @param:-videoId | use for Video id
     * @param:-userId | use for login user id
     * @param:-viewStatus | Status for Video is completed or Not
     * @param:-viewDate | use for View Date
     * @return model
     */
    public static function addVideoView($videoId,$userId,$viewStatus,$viewDate,$totalWatchDuration,$totalVideoDuration)
    {
      
      $videoView= new VideoView;  
      $videoView->video_id=$videoId;
      $videoView->user_id=$userId;
      $videoView->view_date=$viewDate;
      $videoView->view_status=$viewStatus;
      $videoView->total_watch_duration=$totalWatchDuration;
      $videoView->total_video_duration=$totalVideoDuration;
      return $videoView->save();
      
    }
  
    /**
     * checkVideoView function use for checking same video Exist or not
     * @param:-videoId | init / use for videoId
     * @param:-userId | init /use for login user id
     * @return row array 
     */
    public static function checkVideoView($videoId,$userId)
    {
       $data=VideoView::where('video_id', '=', $videoId)->where('user_id', '=', $userId)->first();
       return $data;
    }
    /**
     * updateVideoView function use for Update Video View
     * @param:-$viewStatus =1 | init
     * @param:-$viewDate | use for View date
     * @param:-$totalWatchDuration | 
     */
    public static function updateVideoView($viewStatus,$viewDate,$totalWatchDuration,$id)
    {
        $result=VideoView::where('id', $id)
                ->update([
                   'view_status' => $viewStatus,
                   'view_date' =>$viewDate,
                   'total_video_duration'=>$totalWatchDuration
                ]);
    }
}
