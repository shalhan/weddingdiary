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
            $this->validateData($data);
            $this->groomRepo->save($data);
            return $this->getResponse(200, 'Save groom success', $this->groomRepo->getGroom());
        }
        catch(ServiceException $e) {
            return $e;
        }
    }
    
    private function validateData($data) {
        if(!isset($data["GROOM_NAME"]))
            throw (new ServiceException('Groom name required'))->withData(['GROOM_NAME']);
    }
}
