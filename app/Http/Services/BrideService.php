<?php

namespace App\Http\Services;

use App\Http\Repositories\BrideRepository;
use App\Exceptions\ServiceException;

class BrideService extends Service
{
    private $brideRepo;

    public function __construct(BrideRepository $brideRepo) {
        $this->brideRepo = $brideRepo;
    }

    /**
     * Saving Bride data
     * @param Array Bride data
     * @return Array status, data, message
     * status = 
     *      - 200 OK
     *      - 500 Internal server error
     *      - 400 field required
     */

    public function save($data) {
        try {
            $validations = $this->validateData($data);
            if(count($validations) > 0) {
                return $this->getErrors($validations);
            }
            if(!isset($data["GUID"]))
                $this->brideRepo->save($data);
            else
                $this->brideRepo->edit($data);

            return $this->getResponse(200, 'Save bride success', $this->brideRepo->getBride());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        $validation = [];
        if(!isset($data["BRIDE_NAME"]))
            $validation['BRIDE_NAME'] = 'Bride name required';
        if(!isset($data["BRIDE_REALNAME"]))
            $validation['BRIDE_REALNAME'] = 'Bride real name required';
        
        return $validation;
    }
}
