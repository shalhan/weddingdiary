<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'mstemplate';
    
    public function getResourcesPic($filePath) {
        return ('/template'.$this->id . '/' . $filePath);
    }
}
