<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorMenuVisit extends Model
{
    protected $table = 'trvendormenuvisit';
    protected $fillable = ['GUID', 'MSCOUPLE_GUID', 'IPPUBLIC', 'MSVENDORMENU_GUID', 'DATE'];

    protected $primaryKey = 'GUID';
    
    public $timestamps = false;

    public function create($data) {
        $this->updateOrCreate(
            ['MSCOUPLE_GUID' => $data['MSCOUPLE_GUID'], 'IPPUBLIC' => $data['IPPUBLIC'], 'MSVENDORMENU_GUID' => $data['MSVENDORMENU_GUID']],
            [
                'DATE'=>date("Y-m-d H:i:s"),
            ]
        );
    }
}
