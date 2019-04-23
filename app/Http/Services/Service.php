<?php

namespace App\Http\Services;

class Service
{
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
    
    public function getResponse($status, $message, $data = []) {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }
}
