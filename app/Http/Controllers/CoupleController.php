<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CoupleService;
use App\Http\Repositories\CoupleRepository;
use App\Couple;
use App\Http\Services\MessageService;
use App\Http\Repositories\MessageRepository;
use App\Message;
use App\Http\Services\WeddingService;
use App\Http\Repositories\WeddingRepository;
use App\Wedding;
use App\Http\Services\GalleryService;
use App\Http\Repositories\GalleryRepository;
use App\Gallery;
use App\Http\Services\VisitorService;
use App\Http\Repositories\VisitorRepository;
use App\Visitor;
use App\Http\Services\WeddingPartnerService;
use App\Http\Repositories\WeddingPartnerRepository;
use App\WeddingPartner;
use Route;

class CoupleController extends Controller
{
    private $coupleService;
    private $weddingService;
    private $galleryService;
    private $weddingPartnerService;
    private $FIRST_STEP = 1;
    private $LAST_STEP = 5;
    private  $views = [
        1 => 'pages.couple.create.couple',
        2 => 'pages.couple.create.wedding',
        3 => 'pages.couple.create.photo',
        4 => 'pages.couple.create.gallery',
        5 => 'pages.couple.create.partner',
    ];

    public function __construct() {
        $couple = new Couple();
        $coupleRepo = new CoupleRepository($couple);
        $this->coupleService = new CoupleService($coupleRepo);
        //
        $wedding = new Wedding();
        $weddingRepo = new WeddingRepository($wedding);
        $this->weddingService = new WeddingService($weddingRepo);
        //
        $gallery = new Gallery();
        $galleryRepo = new GalleryRepository($gallery);
        $this->galleryService = new GalleryService($galleryRepo);
        //
        $weddingPartner = new WeddingPartner();
        $weddingPartnerRepo = new WeddingPartnerRepository($weddingPartner);
        $this->weddingPartnerService = new WeddingPartnerService($weddingPartnerRepo);
    }

    /**
     * Show all couples
     * @method GET /couples
     * @param Request ?page
     * @return view
     */

    public function showIndex(Request $req) {
        $data = [
            'page' => isset($req->page) ? $req->page : 1,
            'isPagination' => isset($req->isPagination) ? $req->isPagination : true
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
        $step = 1;  
        
        return view($this->views[$step]);
    }

    /**
     *  Show create couple page
     * @method GET /couples/create?step=xxx
     * @param Request $req
     * @return view
     */

    public function showEdit(Request $req, $coupleId) {
        if(!isset($req->step) || $req->step < $this->FIRST_STEP || $req->step > $this->LAST_STEP)
            $step = $this->FIRST_STEP;  
        else
            $step = $req->step;

        $coupleId = $coupleId;

        if($step == 1)
            $data = $this->coupleService->getById($coupleId);
        else if($step == 2)
            $data = $this->weddingService->getByCoupleId($coupleId);
        else if($step == 3) {
            $coupleService = $this->coupleService->getById($coupleId);
            $data = [
              "coupleImage" =>  $coupleService["data"]->coverImages,
              "groomImage" =>  $coupleService["data"]->groom->GROOM_PHOTO,
              "brideImage" =>  $coupleService["data"]->bride->BRIDE_PHOTO,
            ];
        }
        else if($step == 4) {
            $data = $this->galleryService->getByCoupleId($coupleId);
        }
        else if($step == 5) {
            $data = $this->weddingPartnerService->getByCoupleId($coupleId);
        }
        return view($this->views[$step], compact(['data', 'coupleId']));
    }

    /**
     * Show couple
     * @method GET /couples/{couple_id}
     * @param Request req
     * @param Int id
     * @return view
     */

    public function showCouple(Request $req, $id) {
        if(!isset($id))
            abort(404);

        $data = [
            'page' => isset($req->page) ? $req->page : 1,
        ];
        $couple = $this->coupleService->getById($id);

        $message = new Message();
        $messageRepo = new MessageRepository($message);
        $messageService = new MessageService($messageRepo);
        $messages = $messageService->getByCoupleId($id, $data);

        $visitor = new Visitor();
        $visitorRepo = new VisitorRepository($visitor);
        $visitorService = new VisitorService($visitorRepo);
        $visitors = $visitorService->getByCoupleId($id, $data);
        return view("pages.couple.show", compact(['couple', 'messages', 'visitors']));
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
            'GUID' => isset($req->GUID) ? $req->GUID : null,
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
        return redirect()->route("showEditCouple", ["step" => 2, 'coupleId' => $coupleService["data"]->GUID]);
    }
    /**
     * @param int $id => couple id
     */
    public function dropById($id) {
        $couple = $this->coupleService->dropById($id);

        if(isset($couple["errors"])) {
            abort(500);
        }

        return redirect()->route('showCouples')->with('success', 'Delete couple success');
    }

    public function publish()
    {
        return redirect()->route("showCouples")->with("success", "Publish couple success");
    }
}
