<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['group_title','group_active','user_id'];

    /** Relationships */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
