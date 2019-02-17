<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couple extends Model
{
    protected $table = 'mscouple';

    //subfolder2 is query on url. exp: '?couple=shalhan'
    public function getByToken($token) {
        return $this->select('GUID','MSGROOM_GUID', 'MSBRIDE_GUID', 'MSVENDOR_GUID', 'SUBFOLDER', 'SUBFOLDER2')
                    ->with(['bride', 'groom', 'vendor'])
                    ->where('TOKEN', $token)
                    ->first();
    }

    public function bride() {
        return $this->belongsTo('App\Bride', 'MSBRIDE_GUID', 'GUID');
    }

    public function groom() {
        return $this->belongsTo('App\Groom', 'MSGROOM_GUID', 'GUID');
    }

    public function vendor() {
        return $this->belongsTo('App\Vendor', 'MSVENDOR_GUID', 'GUID');
    }
}
