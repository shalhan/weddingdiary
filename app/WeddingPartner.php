<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeddingPartner extends Model
{
    protected $table = 'msweddingpartner';
    protected $primaryKey = 'GUID';
    protected $fillable = ['MSCOUPLE_GUID', 'WEDDING_PARTNER_LOGO', 'WEDDING_PARTNER_NAME', 'WEDDING_PARTNER_WEBSITE'];
}

