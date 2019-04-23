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

    private $groomService;
    private $brideService;

    public function __construct() {
        $groom = new Groom();
        $groomRepo = new GroomRepository($groom); 
        $this->groomService = new GroomService($groomRepo);

        $bride = new Bride();
        $brideRepo = new BrideRepository($bride);
        $this->brideService = new BrideService($brideRepo);
    }

    /**
     * GET
     * /weddings
     * Show all weddings
     * @return view
     */

    public function showIndex() {
        return view("pages.wedding.index");
    }

    /**
     * GET
     * /weddings/create?step=xxx
     *  Show create wedding page
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

    /**
     * POST
     * /weddings/create?step=1
     * @param Request $req
     *      - groom_name
     *      - groom_facebook
     *      - groom_twitter
     *      - groom_instagram
     *      - bride_name
     *      - bride_facebook
     *      - bride_twitter
     *      - bride_instagram
     *      - subfolder2
     *      - total_photo
     *      - expired_date
     *      - template
     * @return view to next step
     * Save groom, bride, some general setting
     */

    public function saveCouple(Request $req) {
        $dataGroom = [
            'GROOM_NAME' => $req->GROOM_NAME,
            'GROOM_FACEBOOK' => $req->GROOM_FACEBOOK,
            'GROOM_TWITTER' => $req->GROOM_TWITTER,  
            'GROOM_INSTA' =>  $req->GROOM_INSTA,
        ];

        $dataBride = [
            'BRIDE_NAME' => $req->BRIDE_NAME,
            'BRIDE_FACEBOOK' => $req->BRIDE_FACEBOOK,
            'BRIDE_TWITTER' => $req->BRIDE_TWITTER,
            'BRIDE_INSTA' => $req->BRIDE_INSTA,
        ];

        $generalData = [
            'SUBFOLDER2' => $req->SUBFOLDER2,
            'TOTAL_PHOTO' => $req->TOTAL_PHOTO,
            'EXPIRED_DATE' => $req->EXPIRED_DATE,
            'TEMPLATE' => $req->TEMPLATE,
        ];

        $savedGroom = $this->groomService->save($dataGroom);
        $savedBride = $this->brideService->save($dataBride);
        if($savedGroom->error || $savedBride->error) {
            $errors  = $this->getErrors([$savedGroom, $savedBride]);
        }
        return $errors;
    }
}
