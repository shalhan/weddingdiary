<?php

namespace App\Http\Services;

use App\Http\Repositories\VisitorRepository;
use Config;

class VisitorService extends Service
{
    private $visitorRepo;

    public function __construct(VisitorRepository $mr) {
        $this->visitorRepo = $mr;
    }

    /**
     * @param Int $id
     * @param Array data
     */
    public function getByCoupleId($coupleId, $data) {
        try {
            $data['take'] = Config::get('pagination.visitors');
            $data['skip'] = ( $data['page'] - 1 ) * $data['take'];

            $visitors = $this->visitorRepo->getByCoupleId($coupleId, $data);
            return $this->getResponse(200, 'Get visitors by couple id success', $visitors);
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
            $this->visitorRepo->dropById($coupleId);
            return $this->getResponse(200, 'Delete visitor success');
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * @return VisitorRepository
     */
    public function getVisitor() {
        return $this->visitorRepo;
    }
}
