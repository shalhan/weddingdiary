<?php

namespace App\Http\Repositories;

use App\Visitor;

class VisitorRepository extends Repository
{
    private $visitor;

    public function __construct(Visitor $visitor) {
        $this->visitor = $visitor;
    }

    /**
     * @param Int $id
     * @param Array data
     */
    public function getByCoupleId($coupleId, $data) {
        $visitors = $this->visitor
                        ->select('GUID', 'IPPUBLIC', 'MSCOUPLE_GUID', 'BROWSER', 'OS', 'DATETIME')
                        ->where('MSCOUPLE_GUID', $coupleId)
                        ->orderBy('DATETIME', 'desc')
                        ->get();
        return $this->getResponse($visitors, $data);        
    }

    /**
     * @param Int $id
     */

    public function dropById($id) {
        $this->visitor
            ->find($id)
            ->delete();
    }

    /**
     * @return Visitor
     */
    public function getVisitor() {
        return $this->message;
    }
}
