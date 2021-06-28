<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FavoriteVideo;
use App\Model\PremiumWorkoutDetails;
class FavoriteVideoController extends Controller
{
    /**
     * addFavoriteVideo function use for add Favorite Video
     * in which include Two functionality 
     * if FavoriteVideoStatus==1 then FavoriteVideo will be Add 
     * if FavoriteVideoStatus==0 then FavoriteVideo will be delete
     * @param:-$request in which include two Param
     * @param:-userId | init use for Login user id
     * @param:-videoId | integer 
     * @param:-favoriteVideoStatus | integer 
     * @return JSON
     */
    public function addFavoriteVideo(Request $request)
    {
        $userId=$request->input("userId");
        $videoId=$request->input("videoId");
        $favoriteVideoStatus=$request->input("favoriteVideoStatus");
        if($favoriteVideoStatus==0)
        {
           $deleteResult=FavoriteVideo::deleteFavoriteVideo($userId,$videoId);
           if($deleteResult)
           {
             return response()->json(array("status"=>"200","message"=>"This video has been unfavorite"),200);  
           }
           else
           {
            return response()->json(array("status"=>"400","message"=>"something is wrong so please try again"),400); 
           }
        }
        else
        {
        $favoriteVideo=FavoriteVideo::checkFavoriteVideo($userId,$videoId);
        if(empty($favoriteVideo))
        {
            $result=FavoriteVideo::addFavoriteVideo($userId,$videoId);
            if($result)
            {
            return response()->json(array("status"=>"200","message"=>"This video has been added for Favorite"),200);
            }
            else
            {
                return response()->json(array("status"=>"400","message"=>"something is wrong so please try again"),400); 
            }
        }
        else
        {
            return response()->json(array("status"=>"409 ","message"=>"This Video already Favorite"),409);
        }
     }
    }
    public function getFavoriteVideo(Request $request)
    {
        
        $userId=$request->input("userId");
        $favoriteVideo=FavoriteVideo::getFavoriteVideo($userId);
        foreach($favoriteVideo as $fevVideo)
        {
            $videoId=$fevVideo->Video_Id;
            $premiumworkouts=PremiumWorkoutDetails::where('category_id','!=',15)->where('premium_workout_id',$videoId)->with('premiumworkout.subtitle','workoutcategory.unspecifiedcategoryimage','workouttype','chapters')->get();
            $premiumworkouts1=$premiumworkouts->toArray();
            foreach($premiumworkouts1 as $prem)
            {
                 $premiumworkouts2[]=$prem;
            }
        }
        if(!empty($favoriteVideo))
        {
           return response()->json(array("status"=>"200","message"=>"Your favorite Video","data"=>$premiumworkouts2));
        }
        else
        {
            return response()->json(array("status"=>"400","message"=>"No any favorite Video"));
        }
    }

}
