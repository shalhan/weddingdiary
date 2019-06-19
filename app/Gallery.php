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
    public function couple()
    {
        return $this->belongsTo("App\Couple", "MSCOUPLE_GUID", "GUID");
    }
    public function getGalleryThumbnailAttribute()
    {
        if(file_exists(str_replace("/1/", "/1/thumb/", $this->GALLERY_PHOTO)))
            return str_replace("/1/", "/1/thumb/", $this->GALLERY_PHOTO);
        return $this->GALLERY_PHOTO;
    }
}
