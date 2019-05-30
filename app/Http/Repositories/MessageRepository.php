<?php

namespace App\Http\Repositories;

use App\Message;

class MessageRepository extends Repository
{
    private $message;

    public function __construct(Message $message) {
        $this->message = $message;
    }

    /**
     * @param Int $id
     * @param Array data
     */
    public function getByCoupleId($coupleId, $data) {
        $messages = $this->message
                        ->select('GUID', 'MSCOUPLE_GUID', 'TEXT', 'DATE', 'TIME', 'EMAIL', 'NAME', 'GUEST')
                        ->where('MSCOUPLE_GUID', $coupleId)
                        ->orderBy('date', 'desc')
                        ->get();
        return $this->getResponse($messages, $data);        
    }

    /**
     * @param Int $id
     */

    public function dropById($id) {
        $this->message
            ->find($id)
            ->delete();
    }

    /**
     * @return Message
     */
    public function getmessage() {
        return $this->message;
    }
}
