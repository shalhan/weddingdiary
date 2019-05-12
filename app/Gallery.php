<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'msgallery';
    protected $fillable = ["MSCOUPLE_GUID", "GALLERY_PHOTO"];
    protected $primaryKey = 'GUID';
}
