<?php

namespace App\Http\Repositories;

use App\Groom;

class GroomRepository extends Repository
{
    private $groom;

    public function __construct(Groom $groom) {
        $this->groom = $groom;
    }
    
    /**
     * @param Array $data
     */
    public function save($data) {
        $this->groom->GROOM_NAME = $data["GROOM_NAME"];
        $this->groom->GROOM_FACEBOOK = $data["GROOM_FACEBOOK"];
        $this->groom->GROOM_TWITTER = $data["GROOM_TWITTER"];
        $this->groom->GROOM_INSTA = $data["GROOM_INSTA"];
        $this->groom->save();
    }   

    /**
     * @return Groom
     */
    public function getGroom() {
        return $this->groom;
    }
}
