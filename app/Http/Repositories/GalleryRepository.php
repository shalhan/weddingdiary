<?php

namespace App\Http\Repositories;

use App\Gallery;

class GalleryRepository extends Repository
{
    private $gallery;

    public function __construct(Gallery $gallery) {
        $this->gallery = $gallery;
    }
    
    public function getByCoupleId($coupleId) {
        return $this->gallery
                    ->select("GUID", "MSCOUPLE_GUID", "GALLERY_PHOTO")
                    ->where("MSCOUPLE_GUID", $coupleId)
                    ->first();
    }

    public function getBride() {
        return $this->gallery;
    }
}
