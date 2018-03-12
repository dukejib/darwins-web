<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = ['title','slug','active','global_category_id'];

    
    /** Relationships */
    public function global_category()
    {
        return $this->belongsTo('App\GlobalCategory');
    }

    public function local_categories()
    {
        return $this->hasMany('App\LocalCategory');
    }

}
