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
        $this->groom->GROOM_REALNAME = $data["GROOM_REALNAME"];
        $this->groom->GROOM_FACEBOOK = isset($data["GROOM_FACEBOOK"]) ? $data["GROOM_FACEBOOK"] : "#" ;
        $this->groom->GROOM_TWITTER = isset($data["GROOM_TWITTER"]) ? $data["GROOM_TWITTER"] : "#" ;
        $this->groom->GROOM_INSTA = isset($data["GROOM_INSTA"]) ? $data["GROOM_INSTA"] : "#" ;
        $this->groom->save();
    }   

    /**
     * @param Array $data
     */
    public function edit($data) {
        $groom = $this->groom->find($data["GUID"]);
        $groom->GROOM_NAME = $data["GROOM_NAME"];
        $groom->GROOM_REALNAME = $data["GROOM_REALNAME"];
        $groom->GROOM_FACEBOOK = isset($data["GROOM_FACEBOOK"]) ? $data["GROOM_FACEBOOK"] : "#" ;
        $groom->GROOM_TWITTER = isset($data["GROOM_TWITTER"]) ? $data["GROOM_TWITTER"] : "#" ;
        $groom->GROOM_INSTA = isset($data["GROOM_INSTA"]) ? $data["GROOM_INSTA"] : "#" ;
        $groom->update();
        \Log::info($groom);
        $this->groom = $groom;
    }   

    /**
     * @return Groom
     */
    public function getGroom() {
        return $this->groom;
    }
}
