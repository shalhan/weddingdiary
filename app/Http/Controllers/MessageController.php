<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MessageService;
use App\Http\Repositories\MessageRepository;
use App\Message;

class MessageController extends Controller
{
    private $messageService;

    public function __construct() {
        $this->middleware('auth');
        $message = new Message();
        $messageRepo = new MessageRepository($message);
        $this->messageService = new MessageService($messageRepo);
    }

    /**
     * Soft delete messages
     * @method DELETE /messages/{id}
     * @param Int id
     * @return view
     */

    public function dropById($id) {
        $message = $this->messageService->dropById($id);

        if(isset($message["errors"])) {
            abort(500);
        }

        return redirect()->back();
    }
}
