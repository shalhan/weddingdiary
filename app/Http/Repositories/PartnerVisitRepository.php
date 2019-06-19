<?php

namespace App\Http\Repositories;

use App\PartnerVisit;

class PartnerVisitRepository extends Repository
{
    private $partnerVisit;

    public function __construct(PartnerVisit $partnerVisit) {
        $this->partnerVisit = $partnerVisit;
    }

    /**
     * @param Int $id
     * @param Array data
     */
    public function getByCoupleId($coupleId, $data) {
        $messages = $this->partnerVisit
                        ->select('GUID', 'MSCOUPLE_GUID', 'MSVENDOR_GUID', 'IPPUBLIC', 'DATE', 'MSWEDDINGPARTNER_GUID')
                        ->where('MSCOUPLE_GUID', $coupleId)
                        ->with("weddingPartner")
                        ->orderBy('date', 'desc')
                        ->get();
        return $this->getResponse($messages, $data);        
    }

    /**
     * @param Int $id
     */

    public function dropById($id) {
        $this->partnerVisit
            ->find($id)
            ->delete();
    }

    /**
     * @return PartnerVisit
     */
    public function getPartnerVisit() {
        return $this->partnerVisit;
    }
}
