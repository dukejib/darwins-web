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
        'first_name','last_name', 'email', 'password','role','referred_by','affiliate_id'
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

    /** Methods */
    public function referredBy(){
       $ref = Auth::user()->referred_by;
       $user = User::where('affiliate_id',$ref)->first(); 
       return 'Reffered By : ' . $user->first_name . ' ' . $user->last_name . ' Affiliation Id : ' . $user->affiliate_id; 
    }

    public function totalAffiliates()
    {
        $total = count(User::where('referred_by',Auth::user()->affiliate_id)->get());
        return 'total affiliates made : ' . $total; 
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
}
