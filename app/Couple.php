<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couple extends Model
{
    protected $table = 'mscouple';

    //subfolder2 is query on url. exp: '?couple=shalhan'
    public function getByToken($token) {
        return $this->select('GUID','MSGROOM_GUID', 'MSBRIDE_GUID', 'MSVENDOR_GUID', 'SUBFOLDER', 'SUBFOLDER2', "MSTEMPLATE_GUID", "PREWEDPHOTO_AMOUNT")
                    ->with(['bride', 'groom', 'vendor', 'template'])
                    ->where('TOKEN', $token)
                    ->first();
    }

    public function bride() {
        return $this->belongsTo('App\Bride', 'MSBRIDE_GUID', 'GUID');
    }

    public function groom() {
        return $this->belongsTo('App\Groom', 'MSGROOM_GUID', 'GUID');
    }

    public function vendor() {
        return $this->belongsTo('App\Vendor', 'MSVENDOR_GUID', 'GUID');
    }

    public function template() {
        return $this->belongsTo('App\Template', 'MSTEMPLATE_GUID', 'id');
    }

    public function getCouplePic($code) {
        //code == groom / bride
        return url($this->getImagePath() .'/'.$code.'/'.$code.'.jpg');
    }

    public function getSliderPic($key) {
        //code == groom / bride
        return url($this->getImagePath() .'/slider/'.$key.'.jpg');
    }

    public function getGalleryPic($picName, $num = 1, $isThumbnail=false) {
        if($isThumbnail)
            return url($this->getImagePath() . '/gallery/' . $num .'/thumb/'. $picName);
        else
        return url($this->getImagePath() . '/gallery/' . $num .'/'. $picName);
    }

    public function getVendorPic($key) {
        return url($this->getImagePath() . '/' . $key . '.png');
    }

    private function getImagePath() {
        return '/images/ven' . $this->MSVENDOR_GUID;
    }
    
}
