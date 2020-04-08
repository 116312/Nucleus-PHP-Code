<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FemaleCategoryImage extends Model
{
     protected $table= 'female_category_image';


     public function getImageAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}
}
