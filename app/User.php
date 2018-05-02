<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name', 
        'email', 
        'password',
        'role',
        'referred_by',
        'affiliate_id',
        'book_purchased',
        'book_optin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** Relationships */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /** Methods */
    //Used by Public Profile/Account Page
    public function referredBy(){
        $ref = Auth::user()->referred_by;
        $referrer = User::where('affiliate_id',$ref)->first(); 
        return $referrer;   
    }
    //Used by Public Profile/Account Page
    public function totalAffiliates()
    {
        $total = count(User::where('referred_by',Auth::user()->affiliate_id)->get());
        return $total; 
    }
    //Use by Public Profile/Account Page
    public function getMyAffiliates()
    {
        $myaffiliates = User::where('referred_by',Auth::user()->affiliate_id)->get();
        return $myaffiliates;
    }
    //Used by Public Profile/Account Page
    public function getUserProfile($id){
        $profile = User::find($id)->profile()->get();
        return $profile;
    }

    //Used by Admin Panel
    public function getReffererName($id)
    {
        $user = User::where('affiliate_id',$id)->first(); 
        return $user->first_name . ' ' . $user->last_name; 
    }
    //Used by Admin Panel
    public function totalAffiliatesCount($id)
    {
        $total = count(User::where('referred_by',$id)->get());
        return $total; 
    }

    public function isUserAffiliate()
    {
        $role = Auth::user()->role;
        if($role === 1){
            return false;
        }elseif ($role === 2)
        {
            return true;
        }
    }

    public function hasOptedForBook()
    {
        $opted = Auth::user()->book_optin;
        if($opted){
            return true;
        }else{
            return false;
        }
    }

    /** Event Handling */
    // protected static function boot() {
    //     parent::boot();

    //     User::deleting(function($user) {
    //         // $user->orders()->order_details()->delete();
    //         $user->orders()->delete();
    //     });
    // }
}
