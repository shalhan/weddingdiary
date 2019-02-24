<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    protected $table = 'mswedding';

    public function getByCoupleId($coupleId) {
        return $this->where("MSCOUPLE_GUID", $coupleId)->first();
    }

    public function getWeddingStylePic() {
        return ('/images/venue/' . $this->WEDDING_STYLE . '.jpg');
    }
}
