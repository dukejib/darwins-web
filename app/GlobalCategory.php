<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalCategory extends Model
{
    protected $table = 'global_categories';

    protected $fillable = ['title','slug','active'];

    /** Methods */

    /** Relationship */
    public function sub_categories()
    {
        return $this->hasMany('App\SubCategory');
    }
}
