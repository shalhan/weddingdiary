<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'msvendor';

    public function getByToken($token) {
        return $this->select("GUID")
                    ->where("TOKEN", $token)
                    ->first();
    }
}
