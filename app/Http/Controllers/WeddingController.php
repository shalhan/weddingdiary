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
    
     /**
     * Save couple
     * @method POST /save/wedding
     * @param Request $req
     *      - WEDDING_MATRIMONY_VENUE
     *      - WEDDING_MATRIMONY_ADDRESS
     *      - WEDDING_MATRIMONY_TIME
     *      - WEDDING_MATRIMONY_TIMEZONE
     *      - WEDDING_RECEPTION_VENUE
     *      - WEDDING_RECEPTION_ADDRESS
     *      - WEDDING_RECEPTION_TIME
     *      - WEDDING_RECEPTION_TIMEZONE
     *      - GUID
     *      - WEDDING_STYLE
     *      - WEDDING_MAP
     *      - WEDDING_VIDEO
     * @return view to next step
     */

    public function save(Request $req) {
        $dataMatrimony = [
            'WEDDING_MATRIMONY_VENUE' => $req->WEDDING_MATRIMONY_VENUE,
            'WEDDING_MATRIMONY_ADDRESS' => $req->WEDDING_MATRIMONY_ADDRESS,
            'WEDDING_MATRIMONY_TIME' => $req->WEDDING_MATRIMONY_TIME,
            'WEDDING_MATRIMONY_TIMEZONE' => $req->WEDDING_MATRIMONY_TIMEZONE
        ];

        $dataReception = [
            'WEDDING_RECEPTION_VENUE' => $req->WEDDING_RECEPTION_VENUE,
            'WEDDING_RECEPTION_ADDRESS' => $req->WEDDING_RECEPTION_ADDRESS,
            'WEDDING_RECEPTION_TIME' => $req->WEDDING_RECEPTION_TIME,
            'WEDDING_RECEPTION_TIMEZONE' => $req->WEDDING_RECEPTION_TIMEZONE
        ];

        $dataAdd = [
            'GUID' => isset($req->GUID) ? $req->GUID : null,
            'MSCOUPLE_GUID' => isset($req->MSCOUPLE_GUID) ? $req->MSCOUPLE_GUID : null,
            'WEDDING_VIDEO' => $req->WEDDING_VIDEO,
            'WEDDING_MAP' => $req->WEDDING_MAP,
            'WEDDING_STYLE' => $req->WEDDING_STYLE
        ];

        $weddingService = $this->weddingService->save($dataMatrimony, $dataReception, $dataAdd);

        if(isset($weddingService["errors"])) {
            return back()
                    ->withInput()
                    ->withErrors($weddingService["data"]);
        }
        return redirect()->to($req->current_url."?step=3");
    }
}
