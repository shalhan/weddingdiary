<?php

namespace App\Http\Services;

use App\Http\Repositories\PartnerVisitRepository;
use Config;

class PartnerVisitService extends Service
{
    private $partnerVisitRepo;

    public function __construct(PartnerVisitRepository $pr) {
        $this->partnerVisitRepo = $pr;
    }

    /**
     * @param Int $id
     * @param Array data
     */
    public function getByCoupleId($coupleId, $data) {
        try {
            $partnerVisits = $this->partnerVisitRepo->getByCoupleId($coupleId, $data);
            return $this->getResponse(200, 'Get partnerVisits by couple id success', $partnerVisits);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * @param Int $coupleId
     * @param Array data
     */
    public function dropById($coupleId) {
        try {
            $this->partnerVisitRepo->dropById($coupleId);
            return $this->getResponse(200, 'Delete partnerVisit success');
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * @return PartnerVisitRepository
     */
    public function getPartnerVisit() {
        return $this->partnerVisitRepo;
    }
}
