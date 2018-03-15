<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
      'site_name','addrss_line1','address_line2','address_line3',
        'contact_line1','contact_line2','contact_mobile','contact_email','tos_file','refill_statement','app_statement','datafile','carousel_time'
    ];
}
