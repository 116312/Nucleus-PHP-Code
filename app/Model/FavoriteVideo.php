<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class FavoriteVideo extends Model
{
    protected $table = 'Tb_FavouriteVideo';
    protected $primaryKey ='FavouriteVideo_Id';

     /**
     * The model's default  attributes.
     *
     * @var array
     */
    protected $attributes = [
        'User_Id' => "",
        'Video_Id' => "",
        'Favourite_Status' => "1",
        ];

    //
    /**
     *addFavoriteVideo is a static Function 
     * use for Store FavoriteVideo data into Tb_FavouriteVideo tabel
     * @param:-userId | init (Login user Id)
     * @param:-videoId|init( video Id)
     * @return true Or false
     */
    public  static function addFavoriteVideo($userId,$videoId)
    {
         $data = new FavoriteVideo;
         $data->User_Id=$userId;
         $data->Video_Id=$videoId;
         return $data->save();
    }
    /**
     * checkFavoriteVideo function use for video is exist or not 
         according to user  id
     * @param:-userId | use for Login user Id
     * @param:-videoId| ue for video id
     * @return $favoriteVideo | Array of Object
     */
    public static function checkFavoriteVideo($userId,$videoId)
    {
         $favoriteVideo = FavoriteVideo::where('User_Id', '=', $userId)->where('Video_Id', $videoId)->first();
         return $favoriteVideo;
    }
    /**
     *deleteFavoriteVideo function use for delete delete Video from Tb_FavouriteVideo
     *  tabel
     * @param:-userId | use for login user id
     * @param:-videoId | use for videoId 
     * @return true or false
     */
    public static function deleteFavoriteVideo($userId,$videoId)
    {
       $result=FavoriteVideo::where('User_Id', $userId)->where('Video_Id',$videoId)->delete(); 
       return $result;
    }
    public static function getFavoriteVideo($userId)
    {
        $favouriteVideo = DB::table('Tb_FavouriteVideo')
          /*  ->leftJoin('premium_videos', 'Tb_FavouriteVideo.Video_Id', '=', 'premium_videos.id')
            ->leftJoin('premium_workout_details', 'Tb_FavouriteVideo.Video_Id', '=', 'premium_workout_details.premium_workout_id')*/
            ->where('User_Id',$userId)
            ->get();
            return $favouriteVideo;
    }
}
