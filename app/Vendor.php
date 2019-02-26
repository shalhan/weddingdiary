<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'msvendor';
    protected $primaryKey = 'GUID';

    public $timestamps = false;
    public function getByToken($token) {
        return $this->select("GUID")
                    ->where("TOKEN", $token)
                    ->first();
    }
}
