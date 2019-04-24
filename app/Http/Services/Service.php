<?php

namespace App\Http\Services;

class Service
{
    /**
     * @param Array Sarr => ServiceException
     */
    public function getErrors($arr) {
        return array(
            "errors" => true,
            "data" => $arr
        );
    }
    
    public function getResponse($status, $message, $data = []) {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }
}
