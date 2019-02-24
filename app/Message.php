<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'trmessage';

    public function getByCoupleId($coupleId) {
        return $this->where("MSCOUPLE_GUID", $coupleId)->get();
    }
}
