<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $table = 'msgallery';
    protected $fillable = ["MSCOUPLE_GUID", "GALLERY_PHOTO"];
    protected $primaryKey = 'GUID';

    public function getFileNameAttribute() {
        return basename($this->GALLERY_PHOTO);
    }
}
