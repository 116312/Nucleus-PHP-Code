<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PromotionManagement;
use Response;

class PromotionalManagementController extends Controller
{
    public function getallpromotions(){

        

        $promotions = PromotionManagement::all();

         return Response::json(['code' => 200,'status' => true, 'message' => 'All Promotions','data'=>$promotions]);


    }
}
