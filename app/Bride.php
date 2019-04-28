<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bride extends Model
{
    protected $table = 'msbride';
    protected $fillable = ["BRIDE_NAME", "BRIDE_FACEBOOK", "BRIDE_TWITTER", "BRIDE_INSTA"];
    protected $primaryKey = 'GUID';
    public $timestamps = false;
}
