<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'carousels';

    protected $fillable = ['heading','body','image'];

    /** Mutator/Accessors */
    public function getImageAttribute($image)
    {
        return asset($image);
    }
}
