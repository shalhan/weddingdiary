<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groom;
use App\Http\Repositories\GroomRepository;
use App\Http\Services\GroomService;
use App\Bride;
use App\Http\Repositories\BrideRepository;
use App\Http\Services\BrideService;

class WeddingController extends Controller
{
    private $FIRST_STEP = 1;
    private $LAST_STEP = 4;
    private  $views = [
        1 => 'pages.wedding.create.couple',
        2 => 'pages.wedding.create.wedding',
        3 => 'pages.wedding.create.photo',
        4 => 'pages.wedding.create.gallery',
    ];

    private $weddingService;

    public function __construct() {
    }   

    /**
     * Show all weddings
     * @method GET /weddings
     * @return view
     */

    public function showIndex() {
        return view("pages.wedding.index");
    }

    /**
     *  Show create wedding page
     * @method GET /weddings/create?step=xxx
     * @param Request $req
     * @return view
     */

    public function showCreate(Request $req) {
        if(!isset($req->step) || $req->step < $this->FIRST_STEP || $req->step > $this->LAST_STEP)
            $step = $this->FIRST_STEP;  
        else
            $step = $req->step;
            
        return view($this->views[$step]);
    }
}
