<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    protected $table = 'mswedding';
    protected $fillable = ['MSCOUPLE_GUID', 'WEDDING_STYLE', 'WEDDING_MATRIMONY_VENUE', 'WEDDING_MATRIMONY_TIME', 'WEDDING_MATRIMONY_ADDRESS', 'WEDDING_MATRIMONY_TIMEZONE', 'WEDDING_RECEPTION_VENUE', 'WEDDING_RECEPTION_ADDRESS', 'WEDDING_RECEPTION_TIME','WEDDING_RECEPTION_TIMEZONE', 'WEDDING_MAP', 'WEDDING_VIDEO'];
    protected $primaryKey = 'GUID';
    public $timestamps = false;

    public function getByCoupleId($coupleId) {
        return $this->where("MSCOUPLE_GUID", $coupleId)->first();
    }

    public function getWeddingStylePic() {
        return ('/images/venue/' . $this->WEDDING_STYLE . '.jpg');
    }
}