<?php

namespace App\Http\Repositories;

use App\WeddingPartner;

class WeddingPartnerRepository extends Repository
{
    private $weddingPartner;

    public function __construct(WeddingPartner $weddingPartner) {
        $this->weddingPartner = $weddingPartner;
    }
   /**
     * @param Array $data
     * @return WeddingPartner
     */
    public function save($data) {
        $this->weddingPartner->MSCOUPLE_GUID = $data["MSCOUPLE_GUID"];
        $this->weddingPartner->WEDDING_PARTNER_NAME = $data["WEDDING_PARTNER_NAME"];
        $this->weddingPartner->WEDDING_PARTNER_WEBSITE = $data["WEDDING_PARTNER_WEBSITE"];
        $this->weddingPartner->WEDDING_PARTNER_LOGO = "/images/". $data["WEDDING_PARTNER_LOGO"];
        $this->weddingPartner->save();
        return $this->weddingPartner;
    }
    /**
     * @param Array $data
     * @return WeddingPartner

     */
    public function edit($data) {
        $weddingPartner = $this->weddingPartner->find($data["GUID"]);
        $weddingPartner->MSCOUPLE_GUID = $data["MSCOUPLE_GUID"];
        $weddingPartner->WEDDING_PARTNER_NAME = $data["WEDDING_PARTNER_NAME"];
        $weddingPartner->WEDDING_PARTNER_WEBSITE = $data["WEDDING_PARTNER_WEBSITE"];
        $weddingPartner->WEDDING_PARTNER_LOGO = "/images/". $data["WEDDING_PARTNER_LOGO"];
        $weddingPartner->update();
        $this->weddingPartner = $weddingPartner;
    }

    /**
     * Get wedding by couple id
     * @param Int id
     * @return WeddingPartner $wedding
     */
    public function getByCoupleId($coupleId) {
        return $this->weddingPartner
                    ->select('GUID', 'MSCOUPLE_GUID', 'WEDDING_PARTNER_NAME', 'WEDDING_PARTNER_WEBSITE', 'WEDDING_PARTNER_LOGO')
                    ->where("MSCOUPLE_GUID", $coupleId)
                    ->orderBy("GUID", "desc")
                    ->get();
    }

        /**
     * Get wedding by couple id
     * @param Int id
     * @return WeddingPartner $wedding
     */
    public function getById($weddingPartnerId) {
        return $this->weddingPartner
                    ->select('GUID', 'MSCOUPLE_GUID', 'WEDDING_PARTNER_NAME', 'WEDDING_PARTNER_WEBSITE', 'WEDDING_PARTNER_LOGO')
                    ->find($weddingPartnerId);
    }

    /**
     * @param Int $id
     */

    public function drop($weddingPartner) {
        $weddingPartner->delete();
    }

    /**
     * @return WeddingPartner
     */
    public function getWeddingPartner() {
        return $this->weddingPartner;
    }
}
