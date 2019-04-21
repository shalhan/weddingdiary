<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Array Sarr => ServiceException
     */
    public function getErrors($arr) {
        $result = [];
        foreach($arr as $a) {
            $result[$a->data[0]] = $a->getMessage();            
        }
        return $result;
    }
}
