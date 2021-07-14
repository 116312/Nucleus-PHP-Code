<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MaleCategoryImage extends Model
{
    protected $table= 'male_category_image';


    public function getImageAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }

}
}
