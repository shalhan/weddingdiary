<?php

namespace App\Http\Repositories;

use App\Wedding;

class WeddingRepository extends Repository
{
    private $wedding;

    public function __construct(Wedding $wedding) {
        $this->wedding = $wedding;
    }
   /**
     * @param Array $matrimony
     * @param Array $reception
     * @param Array $add
     */
    public function save($matrimony, $reception, $add) {
        $this->wedding->WEDDING_MATRIMONY_VENUE = $matrimony["WEDDING_MATRIMONY_VENUE"];
        $this->wedding->WEDDING_MATRIMONY_ADDRESS = $matrimony["WEDDING_MATRIMONY_ADDRESS"];
        $this->wedding->WEDDING_MATRIMONY_TIME = date("Y-m-d H:i:s", strtotime($matrimony["WEDDING_MATRIMONY_TIME"]));
        $this->wedding->WEDDING_MATRIMONY_TIMEZONE = $matrimony["WEDDING_MATRIMONY_TIMEZONE"];
        $this->wedding->WEDDING_RECEPTION_VENUE = $reception["WEDDING_RECEPTION_VENUE"];
        $this->wedding->WEDDING_RECEPTION_ADDRESS = $reception["WEDDING_RECEPTION_ADDRESS"];
        $this->wedding->WEDDING_RECEPTION_TIME = date("Y-m-d H:i:s", strtotime($reception["WEDDING_RECEPTION_TIME"]));
        $wedding->WEDDING_RECEPTION_TIMEZONE = $reception["WEDDING_RECEPTION_TIMEZONE"];
        $this->wedding->MSCOUPLE_GUID = $add["MSCOUPLE_GUID"];
        $this->wedding->WEDDING_MAP = $add["WEDDING_MAP"];
        $this->wedding->WEDDING_VIDEO = $add["WEDDING_VIDEO"];
        $this->wedding->WEDDING_STYLE = $add["WEDDING_STYLE"];
        $this->wedding->save();
    }
    /**
     * @param Array $matrimony
     * @param Array $reception
     * @param Array $add
     */
    public function edit($matrimony, $reception, $add) {
        $wedding = $this->wedding->find($add["GUID"]);
        $wedding->WEDDING_MATRIMONY_VENUE = $matrimony["WEDDING_MATRIMONY_VENUE"];
        $wedding->WEDDING_MATRIMONY_ADDRESS = $matrimony["WEDDING_MATRIMONY_ADDRESS"];
        $wedding->WEDDING_MATRIMONY_TIME = date("Y-m-d H:i:s", strtotime($matrimony["WEDDING_MATRIMONY_TIME"]));
        $wedding->WEDDING_MATRIMONY_TIMEZONE = $matrimony["WEDDING_MATRIMONY_TIMEZONE"];
        $wedding->WEDDING_RECEPTION_VENUE = $reception["WEDDING_RECEPTION_VENUE"];
        $wedding->WEDDING_RECEPTION_ADDRESS = $reception["WEDDING_RECEPTION_ADDRESS"];
        $wedding->WEDDING_RECEPTION_TIME = date("Y-m-d H:i:s", strtotime($reception["WEDDING_RECEPTION_TIME"]));
        $wedding->WEDDING_RECEPTION_TIMEZONE = $reception["WEDDING_RECEPTION_TIMEZONE"];
        $wedding->MSCOUPLE_GUID = $add["MSCOUPLE_GUID"];
        $wedding->WEDDING_MAP = $add["WEDDING_MAP"];
        $wedding->WEDDING_VIDEO = $add["WEDDING_VIDEO"];
        $wedding->WEDDING_STYLE = $add["WEDDING_STYLE"];
        $wedding->update();
        $this->wedding = $wedding;
    }

    /**
     * Get wedding by couple id
     * @param Int id
     * @return Wedding $wedding
     */
    public function getByCoupleId($coupleId) {
        return $this->wedding
                    ->select('GUID', 'MSCOUPLE_GUID', 'WEDDING_STYLE', 'WEDDING_MATRIMONY_VENUE', 'WEDDING_MATRIMONY_TIME', 'WEDDING_MATRIMONY_ADDRESS', 'WEDDING_MATRIMONY_TIMEZONE', 'WEDDING_RECEPTION_VENUE', 'WEDDING_RECEPTION_ADDRESS', 'WEDDING_RECEPTION_TIME', 'WEDDING_RECEPTION_TIMEZONE', 'WEDDING_MAP', 'WEDDING_VIDEO')
                    ->where("MSCOUPLE_GUID", $coupleId)
                    ->first();
    }

    /**
     * @return Wedding
     */
    public function getWedding() {
        return $this->wedding;
    }
}
