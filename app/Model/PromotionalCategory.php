<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PromotionalCategory extends Model
{
    protected $table= 'promotional_categories';


    public function category()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }
}
