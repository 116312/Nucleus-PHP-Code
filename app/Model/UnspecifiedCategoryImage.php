<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UnspecifiedCategoryImage extends Model
{
    protected $table= 'unspecified_category_image';




    

      public function getImageAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }
}

}
