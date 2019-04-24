<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CoupleService;
use App\Http\Repositories\CoupleRepository;
use App\Couple;
class CoupleController extends Controller
{
    private $coupleService;

    public function __construct() {
        $couple = new Couple();
        $coupleRepo = new CoupleRepository($couple);
        $this->coupleService = new CoupleService($coupleRepo);
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
