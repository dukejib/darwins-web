<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'user_id','primary_contact_no','secondary_contact_no','postal_code','address','address_continued','city','country'
    ];

    /** Relationships */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
