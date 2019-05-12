<?php

namespace App\Http\Services;

use App\Http\Repositories\GalleryRepository;
use App\Exceptions\ServiceException;

class GalleryService extends Service
{
    private $galleryRepo;

    public function __construct(GalleryRepository $galleryRepo) {
        $this->galleryRepo = $galleryRepo;
    }

    public function getByCoupleId($coupleId) {
        try {
            $galleryRepo = $this->galleryRepo->getByCoupleId($coupleId);

            return $this->getResponse(200, 'Save bride success', $galleryRepo);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        $validation = [];
        if(!isset($data["BRIDE_NAME"]))
            $validation['BRIDE_NAME'] = 'Bride name required';
        if(!isset($data["BRIDE_REALNAME"]))
            $validation['BRIDE_REALNAME'] = 'Bride real name required';
        
        return $validation;
    }
}
