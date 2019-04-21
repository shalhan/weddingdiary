<?php

namespace App\Http\Services;

class Service
{
    public function getResponse($status, $message, $data = []) {
        return [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
    }
}
