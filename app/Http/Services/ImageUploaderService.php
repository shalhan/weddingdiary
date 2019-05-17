<?php

namespace App\Http\Services;

use App\Exceptions\ServiceException;
use App\Http\Repositories\ImageUploaderRepository;
use App\Couple;
use App\Groom;
use App\Bride;
use App\Gallery;

class ImageUploaderService extends Service
{
    private $imageUploaderRepo;
    public function __construct(ImageUploaderRepository $imageUploaderRepo) {
        $this->imageUploaderRepo = $imageUploaderRepo;
    }
    
    public function saveCover($coupleId,$path) {
        try {
            $this->imageUploaderRepo->setModel($coupleId, new Couple());

            $couple = $this->imageUploaderRepo->getModel();
            $prevCover = isset($couple->COUPLE_COVER) ? $couple->COUPLE_COVER : null;

            $couple = $this->imageUploaderRepo->saveCover($coupleId, $path);
            $currentPath = isset($couple->COUPLE_COVER) ? $couple->COUPLE_COVER : null;
            $data = [
              "prevPath" => $prevCover,
              "currentPath" =>  $currentPath,
            ];
            return $this->getResponse(200, 'Save photo cover success', $data);
        }
        catch(ServiceException $e) {
            return $e;
        }
        
    }

    public function saveBridePhoto($coupleId, $path) {
        try {
            $this->imageUploaderRepo->setModel($coupleId, new Couple());
            $couple = $this->imageUploaderRepo->getModel();
            $brideId = $couple->MSBRIDE_GUID;
            
            $this->imageUploaderRepo->setModel($brideId, new Bride());

            $bride = $this->imageUploaderRepo->getModel();
            $prevCover = isset($bride->BRIDE_PHOTO) ? $bride->BRIDE_PHOTO : null;

            $bride = $this->imageUploaderRepo->saveBridePhoto($brideId, $path);
            $currentPath = isset($bride->BRIDE_PHOTO) ? $bride->BRIDE_PHOTO : null;
            $data = [
              "prevPath" => $prevCover,
              "currentPath" =>  $currentPath,
            ];
            return $this->getResponse(200, 'Save photo cover success', $data);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    public function saveGroomPhoto($coupleId, $path) {
        try {
            $this->imageUploaderRepo->setModel($coupleId, new Couple());
            $couple = $this->imageUploaderRepo->getModel();
            $groomId = $couple->MSGROOM_GUID;
            
            $this->imageUploaderRepo->setModel($groomId, new Groom());

            $groom = $this->imageUploaderRepo->getModel();
            $prevCover = isset($groom->GROOM_PHOTO) ? $groom->GROOM_PHOTO : null;

            $groom = $this->imageUploaderRepo->saveGroomPhoto($groomId, $path);
            $currentPath = isset($groom->GROOM_PHOTO) ? $groom->GROOM_PHOTO : null;
            $data = [
              "prevPath" => $prevCover,
              "currentPath" =>  $currentPath,
            ];
            return $this->getResponse(200, 'Save photo groom success', $data);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    public function saveGallery($coupleId, $path) {
        try {
            $this->imageUploaderRepo->setModel(null, new Gallery());

            $gallery = $this->imageUploaderRepo->saveGalleryPhoto($coupleId, $path);
            $currentPath = isset($gallery->GALLERY_PHOTO) ? $gallery->GALLERY_PHOTO : null;
            $data = [
              "prevPath" => null,
              "currentPath" =>  $currentPath,
            ];
            return $this->getResponse(200, 'Save gallery photo success', $data);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
}
