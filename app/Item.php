<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title','description','price','active','local_category_id','slug','slot','image'];

    /** Mutator/Accessors */
    public function getImageAttribute($image)
    {
        return asset($image);
    }

    /** Relationships */
}
