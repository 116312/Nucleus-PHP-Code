<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
 protected $table= 'gif';

 protected $fillable = [
        'name', 
    ];

  public function getGifAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}



}
