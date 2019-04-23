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
            $this->validateData($data);
            $this->brideRepo->save($data);
            return $this->getResponse(200, 'Save bride success', $this->brideRepo->getBride());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        if(!isset($data["BRIDE_NAME"]))
            throw (new ServiceException('Bride name required'))->withData(['BRIDE_NAME']);
        if(!isset($data["BRIDE_REALNAME"]))
            throw (new ServiceException('Bride real name required'))->withData(['BRIDE_REALNAME']);
    }
}
