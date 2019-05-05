<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $table = 'trmessage';
    protected $fillable = ['MSCOUPLE_GUID', 'TEXT', 'DATE', 'TIME', 'EMAIL', 'NAME', 'GUEST'];
    protected $primaryKey = 'GUID';

    public $timestamps = false;

    public function getByCoupleId($coupleId) {
        return $this->where("MSCOUPLE_GUID", $coupleId)->get();
    }

    public function create($data) {
        $this->MSCOUPLE_GUID = $data["MSCOUPLE_GUID"];
        $this->TEXT = $data["TEXT"];
        $this->DATE = date("Y-m-d");
        $this->TIME = date("H:i:s");
        $this->EMAIL = $data["EMAIL"];
        $this->NAME = $data["NAME"];
        $this->GUEST = $data["GUEST"];
        $this->save();
    }
}
