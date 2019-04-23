<?php

namespace App\Http\Services;

use App\Http\Repositories\WeddingRepository;
use App\Exceptions\ServiceException;

class WeddingService extends Service
{
    public function __construct() {
        
    }

    /**
     * Saving Wedding data
     * @param Array Wedding data
     * @return Array status, message, data
     * status = 
     *      - 200 OK
     *      - 500 Internal server error
     *      - 400 field required
     */

    public function save($data) {
        try {
            $this->validateData($data);
            $this->weddingRepo->save($data);
            return $this->getResponse(200, 'Save Wedding success', $this->weddingRepo->getWedding());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        if(!isset($data["Wedding_NAME"]))
            throw (new ServiceException('Wedding name required'))->withData(['Wedding_NAME']);
    }
}
