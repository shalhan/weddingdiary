<?php

namespace App\Http\Services;

use App\Http\Repositories\WeddingPartnerRepository;
use App\Exceptions\ServiceException;
use Illuminate\Support\Facades\Storage;
use Auth;

class WeddingPartnerService extends Service
{
    private $weddingPartnerRepo;

    public function __construct(WeddingPartnerRepository $wr) {
        $this->weddingPartnerRepo = $wr;
    }

    /**
     * Saving WeddingPartner data
     * @param Array WeddingPartner data
     * @return Array status, message, data
     * status = 
     *      - 200 OK
     *      - 500 Internal server error
     *      - 400 field required
     */

    public function save($data) {
        try {
            $validations = $this->validateData($data);
            if(isset($errors) || count($validations) > 0) {
                return $this->getErrors($validations);
            }
            $path = $data["LOGO_RESOURCE"]->store($this->getLogoPath($data));
            $data["WEDDING_PARTNER_LOGO"] = $path;
            $weddingPartner = $this->weddingPartnerRepo->save($data);
            // Storage::putFileAs($this->getLogoPath($data), new File($data), 'photo.jpg');
            // Storage::put($data["WEDDING_PARTNER_LOGO"], $data["LOGO_RESOURCE"]);
            return $this->getResponse(200, 'Save wedding partner success', $this->weddingPartnerRepo->getWeddingPartner());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * Get weddingPartner by couple id
     * @param Int id
     * @return WeddingPartnerRepository $weddingPartnerRepo
     */
    public function getByCoupleId($weddingPartnerId) {
        try {
            $weddingPartnerRepo = $this->weddingPartnerRepo->getByCoupleId($weddingPartnerId);
            return $this->getResponse(200, 'Get weddingPartner by wedding partner id success', $weddingPartnerRepo);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * @param Int $weddingPartnerId
     * @param Array data
     */
    public function dropById($weddingPartnerId) {
        try {
            $old = $this->weddingPartnerRepo->getById($weddingPartnerId);
            Storage::delete(str_replace('/images/', "", $old->WEDDING_PARTNER_LOGO));
            $this->weddingPartnerRepo->drop($old);
            //delete image
            return $this->getResponse(200, 'Delete wedding partner success');
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        $validation = [];
        if(!isset($data['WEDDING_PARTNER_NAME']))
            $validation['WEDDING_PARTNER_NAME'] = 'Wedding partner name is required';
        if(!isset($data["WEDDING_PARTNER_WEBSITE"]))
            $validation['WEDDING_PARTNER_WEBSITE'] = 'Wedding partner website is required';
        if(!isset($data["LOGO_RESOURCE"]))
            $validation['LOGO_RESOURCE'] = 'Wedding partner logo is required';
    
        return $validation;
    }

    private function getLogoPath($data) {
        if(Auth::user() && isset($data['LOGO_RESOURCE']) && isset($data["MSCOUPLE_GUID"]))
        {
            $vendorDir = "ven".Auth::user()->GUID;
            $coupleDir = "coup".$data["MSCOUPLE_GUID"];
            return $vendorDir . "/" . $coupleDir ."/partner";
        }         
    }
}
