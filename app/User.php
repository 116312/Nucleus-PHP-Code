<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    


    public function getImageAttribute($value){


        if($value == null){

            return $value;
        }
        else{

            
            return asset('storage/'.$value);
        }
}

    public function userDevices(){
        return $this->hasMany(UserDevice::class,'user_id');
    }


    public function usernucleuschallenge(){

         return $this->hasMany(Model\UserNucleusChallenge::class,'user_id');
    }



    public function usersubscriptiondetails(){

         return $this->hasOne(Model\UserSubscriptionDetails::class,'user_id');
    }
    /**
     *getFreeUsers fuction use for get all Free Users
     * @return @var $users
     */
    public static function getFreeUsers()
    {
         $users = DB::table("users")->select('*')
            ->whereNOTIn('id',function($query){
               $query->select('user_id')->from('user_subscription_details');
            })->orderBy('created_at','desc')->get();
            $users=$users->toArray();
            return $users;
    }
    /**
     *getAllSubscribedUsers use for get all subscribed users
     * return @pram:-$subscribedUsers
     */ 
    public static function getAllSubscribedUsers()
    {
      $subscribedUsers = DB::table('user_subscription_details')
                ->select('user_subscription_details.id as subscriptionId','user_subscription_details.user_id','user_subscription_details.payment_id'
                ,'user_subscription_details.transaction_id','user_subscription_details.amount'
                ,'user_subscription_details.product','user_subscription_details.Device_Type','user_subscription_details.receipt','users.name','users.email','users.contact_no','users.country','users.created_at','users.gender')
                ->join('users', 'users.id', '=', 'user_subscription_details.user_id')
                ->get();
                return $subscribedUsers;
    }

}
