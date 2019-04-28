<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wedding;
use App\Http\Repositories\WeddingRepository;
use App\Http\Services\WeddingService;


class WeddingController extends Controller
{
    private $weddingService;

    public function __construct() {
        $wedding = new Wedding();
        $weddingRepo = new WeddingRepository($wedding);
        $this->weddingService = new WeddingService($weddingRepo);
    }   
}
