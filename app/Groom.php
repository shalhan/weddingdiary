<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groom extends Model
{
    protected $table = 'msgroom';
    protected $fillable = ["GROOM_NAME", "GROOM_FACEBOOK", "GROOM_TWITTER", "GROOM_INSTA"];
    protected $primaryKey = 'GUID';
    public $timestamps = false;
}
