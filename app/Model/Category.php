<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table= 'categories';


     public function femalecategoryimage()
    {
        return $this->hasOne('App\Model\FemaleCategoryImage','category_id');
    }


     public function malecategoryimage()
    {
        return $this->hasOne('App\Model\MaleCategoryImage','category_id');
    }
}
