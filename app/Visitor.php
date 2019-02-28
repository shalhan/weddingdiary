<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'trvisitor';
    protected $fillable = ['GUID', 'MSCOUPLE_GUID', 'IPPUBLIC', 'BROWSER', 'OS', 'DATETIME'];

    protected $primaryKey = 'GUID';
    
    public $timestamps = false;

    public function create($data) {
        $this->updateOrCreate(
            ['MSCOUPLE_GUID' => $data['MSCOUPLE_GUID'], 'IPPUBLIC' => $data['IPPUBLIC']],
            [
                'BROWSER'=>$data['BROWSER'],
                'OS'=>$data['OS'],
                'DATETIME'=>date("Y-m-d H:i:s"),
            ]
        );
    }

}
