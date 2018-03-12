<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebBanner extends Model
{
    protected $table = 'web_banners';

    protected $fillable = ['title','style','gif_weight','flash_weight','image'];
}
