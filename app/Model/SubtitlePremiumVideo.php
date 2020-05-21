<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubtitlePremiumVideo extends Model
{
  protected $table = 'subtitle_premium_video'; 



     public function languages()
    {
        return $this->belongsTo('App\Model\Language','language_id');
    }

      public function premiumvideos()
    {
        return $this->belongsTo('App\Model\PremiumVideos','premium_video_id');
    }
    
    
}
