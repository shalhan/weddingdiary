<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CoupleService;
use App\Http\Repositories\CoupleRepository;
use App\Couple;
class CoupleController extends Controller
{
    private $coupleService;
    private $FIRST_STEP = 1;
    private $LAST_STEP = 4;
    private  $views = [
        1 => 'pages.couple.create.couple',
        2 => 'pages.couple.create.wedding',
        3 => 'pages.couple.create.photo',
        4 => 'pages.couple.create.gallery',
    ];

    public function __construct() {
        $couple = new Couple();
        $coupleRepo = new CoupleRepository($couple);
        $this->coupleService = new CoupleService($coupleRepo);
    }

    /**
     * Show all couples
     * @method GET /couples
     * @param Request ?page
     * @return view
     */

    public function showIndex(Request $req) {
        $data = [
            'page' => isset($req->page) ? isset($req->page) : 1
        ];

        $couples = $this->coupleService->getAll($data);
        if(isset($couples["errors"])) {
            abort(500);
        }

        return view("pages.couple.index", compact('couples'));
    }

    /**
     *  Show create couple page
     * @method GET /couples/create?step=xxx
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
     * Show couple
     * @method GET /couples/{couple_id}
     * @return view
     */

    public function showCouple($id) {
        if(!isset($id))
            abort(404);
        
        $couple = $this->coupleService->getById($id);
        return view("pages.couple.show", compact(['couple']));
    }

    /**
     * Create couple
     * @method POST /weddings/create?step=1
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

    public function save(Request $req) {
        $dataGroom = [
            'GROOM_REALNAME' => $req->GROOM_REALNAME,
            'GROOM_NAME' => $req->GROOM_NAME,
            'GROOM_FACEBOOK' => $req->GROOM_FACEBOOK,
            'GROOM_TWITTER' => $req->GROOM_TWITTER,  
            'GROOM_INSTA' =>  $req->GROOM_INSTA,
        ];

        $dataBride = [
            'BRIDE_REALNAME' => $req->BRIDE_REALNAME,
            'BRIDE_NAME' => $req->BRIDE_NAME,
            'BRIDE_FACEBOOK' => $req->BRIDE_FACEBOOK,
            'BRIDE_TWITTER' => $req->BRIDE_TWITTER,
            'BRIDE_INSTA' => $req->BRIDE_INSTA,
        ];
        $dataCouple = [
            'SUBFOLDER2' => $req->SUBFOLDER2,
            'PREWEDPHOTO_AMOUNT' => $req->PREWEDPHOTO_AMOUNT,
            'EXPIRED_DATE' => $req->EXPIRED_DATE,
            'MSTEMPLATE_GUID' => $req->MSTEMPLATE_GUID,
        ];

        $coupleService = $this->coupleService->save($dataGroom, $dataBride, $dataCouple);
        
        if(isset($coupleService["errors"])) {
            return back()
                    ->withInput()
                    ->withErrors($coupleService["data"]);
        }

        return redirect()->back();
    }
}
