<?php

namespace App\Http\Services;

use App\Http\Repositories\GroomRepository;
use App\Exceptions\ServiceException;

class GroomService extends Service
{
    private $groomRepo;

    public function __construct(GroomRepository $groomRepo) {
        $this->groomRepo = $groomRepo;
    }

    /**
     * Saving groom data
     * @param Array groom data
     * @return Array status, message, data
     * status = 
     *      - 200 OK
     *      - 500 Internal server error
     *      - 400 field required
     */

    public function save($data) {
        try {
            $validations = $this->validateData($data);
            if(count($validations) > 0){
                return $this->getErrors($validations);
            }

            if(!isset($data["GUID"])) {
                $this->groomRepo->save($data);
            }
            else {
                $this->groomRepo->edit($data);
            }
            return $this->getResponse(200, 'Save groom success', $this->groomRepo->getGroom());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        $validation = [];
        if(!isset($data["GROOM_NAME"]))
            $validation['GROOM_NAME'] = 'Groom name required';
        if(!isset($data["GROOM_REALNAME"]))
            $validation['GROOM_REALNAME'] = 'Groom real name required';
        
        return $validation;
    }
}
