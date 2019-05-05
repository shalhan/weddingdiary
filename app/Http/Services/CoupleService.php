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
            //create couple
            if($dataCouple["GUID"] != null) {
                $couple = $this->coupleRepo->getById($dataCouple["GUID"]);
                $dataGroom["GUID"]  = isset($couple->MSGROOM_GUID) ? $couple->MSGROOM_GUID : null;
                $dataBride["GUID"]  = isset($couple->MSBRIDE_GUID) ? $couple->MSBRIDE_GUID : null;
            }

            $savedGroom = $this->groomService->save($dataGroom);
            $savedBride = $this->brideService->save($dataBride);
            
            //check if there are errors when insert groom and bride
            if(isset($savedGroom["errors"]) || isset($savedBride["errors"])) {
                $groomErrors = isset($savedGroom["errors"]) ? $savedGroom["data"] : array();
                $brideErrors = isset($savedBride["errors"]) ? $savedBride["data"] : array();
                
                $errors  = array_merge($groomErrors, $brideErrors);
            }
            
            //validate couple data
            $validations = $this->validateData($dataCouple);
            if(isset($errors) || count($validations) > 0) {
                return $this->getErrors( array_merge($validations, $errors) );
            }

            $dataCouple["MSGROOM_GUID"] = $savedGroom["data"]->GUID;
            $dataCouple["MSBRIDE_GUID"] = $savedBride["data"]->GUID;
            //insert if couple id not exist
            if(!isset($dataCouple["GUID"]))
                $savedCouple = $this->coupleRepo->save($dataCouple);
            else
                $savedCouple = $this->coupleRepo->edit($dataCouple);

            return $this->getResponse(200, 'Save couple success', $this->coupleRepo->getCouple());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * Get all couple data per page
     * @param Array request
     * @return CoupleRepository $coupleRepo
     */
    public function getAll($data) {
        try {
            $couples = $this->coupleRepo->getAll($data);
            return $this->getResponse(200, 'Get all couple success', $couples);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * Get all couple data per page
     * @param Int id
     * @return CoupleRepository $coupleRepo
     */
    public function getById($id) {
        try {
            $couple = $this->coupleRepo->getById($id);
            return $this->getResponse(200, 'Get couple by id success', $couple);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * @param int $id => couple id 
     */
    public function dropById($id) {
        try {
            $this->coupleRepo->dropById($id);
            return $this->getResponse(200, 'Delete couple success');
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        $validation = [];
        if(!isset($data['SUBFOLDER2']))
            $validation['SUBFOLDER2'] = 'URL is required';
        if(!isset($data["EXPIRED_DATE"]))
            $validation['EXPIRED_DATE'] = 'Expired date is required';
        if(!isset($data["PREWEDPHOTO_AMOUNT"]))
            $validation['PREWEDPHOTO_AMOUNT'] = 'Photo amount is required';
        if(!isset($data["MSTEMPLATE_GUID"]))
            $validation['MSTEMPLATE_GUID'] = 'Template id is required';
        
        return $validation;
    }
}
