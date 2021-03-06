<?php

namespace App\Http\Repositories;

use Auth;

class ImageUploaderRepository extends Repository
{
    private $model;
    private $PREFIX = '/images/';
    public function __construct() {
    }
    public function setModel($id, $model) {
        $this->model = $model;
        if($id != null)
            $this->model = $model->find($id);
    }
    public function getModel() {
        return $this->model;
    }
    public function saveCover($coupleId, $path, $index) {
        $model = $this->model->find($coupleId);
        $var = "COUPLE_COVER_".$index;
        $model->$var = $this->PREFIX . $path;
        $model->update();
        \Log::info($model);
        return $model;
    }
    public function saveBridePhoto($brideId, $path) {
        $model = $this->model->find($brideId);
        $model->BRIDE_PHOTO = $this->PREFIX . $path;
        $model->update();
        return $model;
    }
    public function saveGroomPhoto($groomId, $path) {
        $model = $this->model->find($groomId);
        $model->GROOM_PHOTO = $this->PREFIX . $path;
        $model->update();
        return $model;
    }
    public function saveGalleryPhoto($coupleId, $path) {
        $this->model->MSCOUPLE_GUID = $coupleId;
        $this->model->GALLERY_PHOTO = $this->PREFIX . $path;
        $this->model->save();
        return $this->model;
    }
    public function dropGalleryById($galleryId) {
        $gallery = $this->model->find($galleryId);
        $prevGallery = $gallery;
        if($gallery->couple->MSVENDOR_GUID == Auth::user()->GUID)
            $gallery->delete();
        return $prevGallery;
    }
}
