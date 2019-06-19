<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerVisit extends Model
{
    protected $table = 'trpartnervisit';
    protected $fillable = ['GUID', 'MSCOUPLE_GUID', 'IPPUBLIC', 'MSWEDDINGPARTNER_GUID', 'DATE', "MSVENDOR_GUID"];

    protected $primaryKey = 'GUID';
    
    public $timestamps = false;

    public function create($data) {
        $this->updateOrCreate(
            ['MSCOUPLE_GUID' => $data['MSCOUPLE_GUID'], 'IPPUBLIC' => $data['IPPUBLIC'], 'MSWEDDINGPARTNER_GUID' => $data['MSWEDDINGPARTNER_GUID'], 'MSVENDOR_GUID' => $data['MSVENDOR_GUID']],
            [
                'DATE'=>date("Y-m-d H:i:s"),
            ]
        );
    }

    public function weddingPartner()
    {
        return $this->belongsTo("App\WeddingPartner", "MSWEDDINGPARTNER_GUID", "GUID");
    }
}
