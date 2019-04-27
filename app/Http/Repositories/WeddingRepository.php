<?php

namespace App\Http\Repositories;

use App\Wedding;

class WeddingRepository extends Repository
{
    private $wedding;

    public function __construct(Wedding $wedding) {
        $this->wedding = $wedding;
    }

    /**
     * @return Wedding
     */
    public function getWedding() {
        return $this->wedding;
    }
}
