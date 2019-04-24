<?php

namespace App\Http\Services;

use App\Http\Repositories\CoupleRepository;
use App\Http\Repositories\GroomRepository;
use App\Http\Repositories\BrideRepository;
use App\Http\Services\BrideService;
use App\Http\Services\GroomService;
use App\Groom;
use App\Bride;
use App\Exceptions\ServiceException;


class CoupleService extends Service
{
    private $coupleRepo;

    private $groomService;
    private $brideService;

    public function __construct(CoupleRepository $coupleRepo) {
        $this->coupleRepo = $coupleRepo;

        $groom = new Groom();
        $groomRepo = new GroomRepository($groom); 
        $this->groomService = new GroomService($groomRepo);

        $bride = new Bride();
        $brideRepo = new BrideRepository($bride);
        $this->brideService = new BrideService($brideRepo);
    }

    /**
     * Saving Couple data
     * @param Array Couple data
     * @return Array status, data, message
     * status = 
     *      - 200 OK
     *      - 500 Internal server error
     *      - 400 field required
     */

    public function save($dataGroom, $dataBride, $dataCouple) {
        try {
            $savedGroom = $this->groomService->save($dataGroom);
            $savedBride = $this->brideService->save($dataBride);
            if(isset($savedGroom["errors"]) || isset($savedBride["errors"])) {
                $groomErrors = isset($savedGroom["errors"]) ? $savedGroom["data"] : array();
                $brideErrors = isset($savedBride["errors"]) ? $savedBride["data"] : array();
                
                $errors  = $this->getErrors( array_merge($groomErrors, $brideErrors) );
                return $errors;
            }
            return $savedBride["errors"];
            $dataCouple["MSGROOM_GUID"] = $savedGroom["data"]->GUID;
            $dataCouple["MSBRIDE_GUID"] = $savedBride["data"]->GUID;

            $validations = $this->validateData($dataCouple);
            if(count($validations) > 0) {
                return $this->getErrors($validations);
            }

            $savedCouple = $this->coupleRepo->save($dataCouple);

            return $this->getResponse(200, 'Save couple success', $this->coupleRepo->getCouple());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        $validation = [];
        if(!isset($data["MSGROOM_GUID"]))
            $validation['MSGROOM_GUID'] = 'Groom id is required';
        if(!isset($data["MSBRIDE_GUID"]))
            $validation['MSBRIDE_GUID'] = 'Bride id name required';
        if(!isset($data["EXPIRED_DATE"]))
            $validation['EXPIRED_DATE'] = 'Expired date required';
        if(!isset($data["PREWEDPHOTO_AMOUNT"]))
            $validation['PREWEDPHOTO_AMOUNT'] = 'Photo amount is required';
        if(!isset($data["MSTEMPLATE_GUID"]))
            $validation['MSTEMPLATE_GUID'] = 'Template id is required';
        
        return $validation;
    }
}
