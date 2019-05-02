<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couple extends Model
{
    protected $table = 'mscouple';
    protected $primaryKey = 'GUID';
    protected $fillable = ['MSGROOM_GUID', 'MSBRIDE_GUID', 'PACKAGE_ID', 'EXPIRED_DATE', 'STATUS', 'LOVE_STORY', 'MSVENDOR_GUID', 'PREWEDPHOTO_AMOUNT', 'VIEW_AMOUNT', 'CREATED_DATE', 'SUBFOLDER', 'SUBFOLDER2', 'MSTEMPLATE_GUID'];

    public $timestamps = false;
    //subfolder2 is query on url. exp: '?couple=shalhan'
    public function getByVendorId($vendorId, $subfolder2 = null) {
        return $this->select('GUID','MSGROOM_GUID', 'MSBRIDE_GUID', 'MSVENDOR_GUID', 'SUBFOLDER', 'SUBFOLDER2', "MSTEMPLATE_GUID", "PREWEDPHOTO_AMOUNT")
                    ->with(['bride', 'groom', 'vendor', 'template'])
                    ->where('MSVENDOR_GUID', $vendorId)
                    ->get();
    }

    public function getById($coupleId, $subfolder2 = null) {
        return $this->select('GUID','MSGROOM_GUID', 'MSBRIDE_GUID', 'MSVENDOR_GUID', 'SUBFOLDER', 'SUBFOLDER2', "MSTEMPLATE_GUID", "PREWEDPHOTO_AMOUNT")
                    ->find($coupleId);
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

    public function messages() {
        return $this->hasMany('App\Message', 'MSCOUPLE_GUID', 'GUID');
    }

    public function visitors() {
        return $this->hasMany('App\Visitor', 'MSCOUPLE_GUID', 'GUID');
    }

    public function vendorMenuVisits() {
        return $this->hasMany('App\vendorMenuVisit', 'MSCOUPLE_GUID', 'GUID');
    }

    public function getPrettyLinkAttribute() {
        return explode("=", $this->SUBFOLDER2)[1];
    }

    public function totalVisitors() {
        return count($this->visitors());
    }

    public function totalMessages() {
        return count($this->messages());
    }

    public function totalVendorMenuVisits() {
        return count($this->vendorMenuVisits());
    }


    public function getCouplePic($code) {
        //code == groom / bride
        return url($this->getImageVendorPath() .'/'.$code.'/'.$code.'.jpg');
    }

    public function getSliderPic($key) {
        //code == groom / bride
        return url($this->getImageVendorPath() .'/slider/'.$key.'.jpg');
    }

    public function getGalleryPic($picName = "", $num = 1, $isThumbnail=false) {
        if($isThumbnail)
            return url($this->getImageVendorPath() . '/gallery/' . $num .'/thumb/'. $picName);
        else
            return url($this->getImageVendorPath() . '/gallery/' . $num .'/'. $picName);
    }

    public function getVendorPic($key) {
        return url($this->getImageVendorPath() . '/' . $key . '.png');
    }

    public function getVendorLogo($color = null) {
        $logo = 'logo';
        if($color == 'white')
            $logo = 'logo-'.$color;
            
        return url('/images/ven' . $this->MSVENDOR_GUID . '/' . $logo . '.png' );
    }
    private function getImageVendorPath() {
        return '/images/ven' . $this->MSVENDOR_GUID . '/coup' . $this->GUID;
    }
    
}
