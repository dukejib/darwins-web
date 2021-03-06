<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
      'site_name','address_line1','address_line2','address_line3',
        'contact_line1','contact_line2','contact_mobile','contact_email','tos_file','refill_statement','app_statement','datafile','carousel_time','fed_tax','shipping_charges','tos_filename','brochure_filename',

        'v2apikey','bcwallet','xpub1','xpub2','xpub3','xpub4','xpub5'
      
      
      ];
}
