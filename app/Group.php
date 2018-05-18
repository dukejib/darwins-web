<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['group_title','group_active'];

    /** Relationships */
    public function users()
    {
        return $this->belongsToMany('App\User','group_users');
    }
}
