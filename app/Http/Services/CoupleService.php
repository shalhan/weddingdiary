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
            if(isset($savedGroom->error) || isset($savedBride->error)) {
                $errors  = $this->getErrors([$savedGroom, $savedBride]);
                return $errors;
            }
            \Log::info($savedGroom);
            $dataCouple["MSGROOM_GUID"] = $savedGroom["data"]->GUID;
            $dataCouple["MSBRIDE_GUID"] = $savedBride["data"]->GUID;

            $this->validateData($dataCouple);
            $this->coupleRepo->save($dataCouple);
            return $this->getResponse(200, 'Save couple success', $this->coupleRepo->getCouple());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        if(!isset($data["MSGROOM_GUID"]))
            throw (new ServiceException('Groom id is required'))->withData(['MSGROOM_GUID']);
        if(!isset($data["MSBRIDE_GUID"]))
            throw (new ServiceException('Bride id is required'))->withData(['MSBRIDE_GUID']);
        if(!isset($data["EXPIRED_DATE"]))
            throw (new ServiceException('Expired date is required'))->withData(['EXPIRED_DATE']);
        if(!isset($data["PREWEDPHOTO_AMOUNT"]))
            throw (new ServiceException('Photo amount is required'))->withData(['PREWEDPHOTO_AMOUNT']);
        if(!isset($data["MSTEMPLATE_GUID"]))
            throw (new ServiceException('Template id is required'))->withData(['MSTEMPLATE_GUID']);
    }
}
