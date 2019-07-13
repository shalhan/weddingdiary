<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeddingPartner;
use App\Http\Repositories\WeddingPartnerRepository;
use App\Http\Services\WeddingPartnerService;

class WeddingPartnerController extends Controller
{
    private $weddingPartnerService;

    public function __construct() {
        $this->middleware('auth');
        $weddingPartner = new WeddingPartner();
        $weddingPartnerRepo = new WeddingPartnerRepository($weddingPartner);
        $this->weddingPartnerService = new WeddingPartnerService($weddingPartnerRepo);
    }  
    /**
     * Save couple
     * @method POST /save/wedding-partner
     * @param Request $req
     *      - WEDDING_PARTNER_NAME
     *      - WEDDING_PARTNER_WEBSITE
     *      - WEDDING_PARTNER_LOGO
     * @return view to next step
     */

    public function save(Request $req) {
        $data = [
            "MSCOUPLE_GUID" => isset($req->MSCOUPLE_GUID) ? $req->MSCOUPLE_GUID : null,
            "WEDDING_PARTNER_NAME" => $req->WEDDING_PARTNER_NAME,
            "WEDDING_PARTNER_WEBSITE" => $req->WEDDING_PARTNER_WEBSITE,
            "LOGO_RESOURCE" => $req->file('LOGO_RESOURCE')
        ];
        $weddingPartnerService = $this->weddingPartnerService->save($data);

        if(isset($weddingPartnerService["errors"])) {
            return back()
                    ->withInput()
                    ->withErrors($weddingPartnerService["data"]);
        }
        return redirect()->back();
    }

        /**
     * Soft delete messages
     * @method DELETE /wedding-partner/{id}
     * @param Int id
     * @return view
     */

    public function dropById($id) {
        $weddingPartnerService = $this->weddingPartnerService->dropById($id);

        if(isset($weddingPartnerService["errors"])) {
            abort(500);
        }

        return redirect()->back();
    }
}
