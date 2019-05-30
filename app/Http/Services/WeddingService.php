<?php

namespace App\Http\Services;

use App\Http\Repositories\WeddingRepository;
use App\Exceptions\ServiceException;

class WeddingService extends Service
{
    private $weddingRepo;

    public function __construct(WeddingRepository $wr) {
        $this->weddingRepo = $wr;
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

    public function save($matrimony, $reception, $add) {
        try {
            if(isset($add["GUID"]))
                $this->weddingRepo->edit($matrimony, $reception, $add);
            else
                $this->weddingRepo->save($matrimony, $reception, $add);

            return $this->getResponse(200, 'Save Wedding success', $this->weddingRepo->getWedding());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * Get wedding by couple id
     * @param Int id
     * @return WeddingRepository $weddingRepo
     */
    public function getByCoupleId($coupleId) {
        try {
            $weddingRepo = $this->weddingRepo->getByCoupleId($coupleId);
            return $this->getResponse(200, 'Get wedding by couple id success', $weddingRepo);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($matrimony, $reception, $add = null) {
        $validation = [];
        if(!isset($matrimony['WEDDING_MATRIMONY_VENUE']))
            $validation['WEDDING_MATRIMONY_VENUE'] = 'Wedding matrimony venue is required';
        if(!isset($matrimony["WEDDING_MATRIMONY_ADDRESS"]))
            $validation['WEDDING_MATRIMONY_ADDRESS'] = 'Wedding matrimony address is required';
        if(!isset($matrimony["WEDDING_MATRIMONY_TIME"]))
            $validation['WEDDING_MATRIMONY_TIME'] = 'Wedding matrimony time is required';
        if(!isset($matrimony["WEDDING_MATRIMONY_TIMEZONE"]))
            $validation['WEDDING_MATRIMONY_TIMEZONE'] = 'Wedding matrimony timezone is required';

        if(!isset($reception['WEDDING_RECEPTION_VENUE']))
            $validation['WEDDING_RECEPTION_VENUE'] = 'Wedding reception venue is required';
        if(!isset($reception["WEDDING_RECEPTION_ADDRESS"]))
            $validation['WEDDING_RECEPTION_ADDRESS'] = 'Wedding reception address is required';
        if(!isset($reception["WEDDING_RECEPTION_TIME"]))
            $validation['WEDDING_RECEPTION_TIME'] = 'Wedding reception time is required';
        if(!isset($reception["WEDDING_RECEPTION_TIMEZONE"]))
            $validation['WEDDING_RECEPTION_TIMEZONE'] = 'Wedding receptions timezone is required';
    
        return $validation;
    
    }
}
