<?php

namespace App\Http\Services;

use App\Http\Repositories\MessageRepository;
use Config;

class MessageService extends Service
{
    private $messageRepo;

    public function __construct(MessageRepository $mr) {
        $this->messageRepo = $mr;
    }

    /**
     * @param Int $id
     * @param Array data
     */
    public function getByCoupleId($coupleId, $data) {
        try {
            $data['take'] = Config::get('pagination.couples');
            $data['skip'] = ( $data['page'] - 1 ) * $data['take'];

            $messages = $this->messageRepo->getByCoupleId($coupleId, $data);
            return $this->getResponse(200, 'Get messages by couple id success', $messages);
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * @param Int $coupleId
     * @param Array data
     */
    public function dropById($coupleId) {
        try {
            $this->messageRepo->dropById($coupleId);
            return $this->getResponse(200, 'Delete message success');
        }
        catch(ServiceException $e) {
            return $e;
        }
    }

    /**
     * @return MessageRepository
     */
    public function getMessage() {
        return $this->messageRepo;
    }
}
