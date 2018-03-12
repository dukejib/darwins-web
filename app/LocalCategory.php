<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalCategory extends Model
{
    protected $table = 'local_categories';

    protected $fillable = ['title','slug','sub_category_id'];

    /** Relationships */
    public function sub_category()
    {
        return $this->belongsTo('App\SubCategory');
    }
}
