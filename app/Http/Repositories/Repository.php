<?php

namespace App\Http\Repositories;

class Repository
{
    public function getResponse($data, $query = null) {
        if($query === null)
            return $data;
        else if(!$query['isPagination'])
            return $data;
        
        return [
            'pagination' => $data,
            'prevPage' => $query['page'] - 1 > 0 ? $query['page'] - 1 : null,
            'nextPage' => $query['page'] + 1
        ];
    }
}
