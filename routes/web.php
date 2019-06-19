<?php
use Illuminate\Http\Request;

use App\Couple;
use App\Wedding;
use App\Message;
use App\Vendor;
use App\PartnerVisit;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// $DEV_CURRENT_URL = "http://abphotographs.com";
// $DEV_CURRENT_URL = "http://localhost";

Route::get('/', function (Request $req) {
    $vendors = new Vendor();
    $vendor = $vendors->getByToken($req->token);
    if(!$vendor)
        abort(404);
        
    $couples = new Couple();
    $vendorCouples = $couples->getByVendorId($vendor->GUID);
    if(!$vendorCouples)
        abort(404);

    foreach($vendorCouples as $couple) {
        $weddings = new Wedding();
        $messages = new Message();
        $wedding = $weddings->getByCoupleId($couple->GUID);
        $messages = $messages->getByCoupleId($couple->GUID);
        $template = $couple->template;
        $subFolder2 = $couple->SUBFOLDER2;
        $vendorId = $couple->MSVENDOR_GUID;
        foreach($req->query() as $key => $value) {
            if($key . '=' . $value == $subFolder2) {
                visited($couple->GUID,$req->ip());
                return view('templates.template'.$couple->MSTEMPLATE_GUID, compact('couple', 'wedding', 'messages', 'template'));
            }
        }
    }
    abort(404);
});

//submit comment
Route::post('/messages/{coupleId}', function (Request $req, $coupleId) {
    $messages = [
        'required' => ':attribute harus di isi',
    ];
    Validator::make($req->all(), [
        'Nama' => 'required',
        'Email' => 'required',
        'Pesan' => 'required',
    ], $messages)->validate();

    $couples = new Couple();
    $couple = $couples->getById($coupleId);
    $data = [
        "MSCOUPLE_GUID" => $couple->GUID,
        "TEXT" => $req->Pesan,
        "EMAIL" => $req->Email,
        "NAME" => $req->Nama,
        "GUEST" => $req->Tamu,
    ];
    $messages = new Message();
    $messages->create($data);
    return redirect()->back()->with('success', 'Pesan kamu berhasil terkirim');
});

//redirect
Route::get('/redirect', function (Request $req) {
    $clientData = getClientMeta($req->ip());
    $data = [
        'MSCOUPLE_GUID'=>$req->couple_id,
        'MSWEDDINGPARTNER_GUID'=>$req->partner_id,
        'IPPUBLIC' => $clientData["ipAddress"],
        'MSVENDOR_GUID' => $req->vendor_id
    ];
    $partnerVisitors = new PartnerVisit();
    $partnerVisitors->create($data);
    header('Location: ' . $req->redirect_to);
    exit();
});

Route::group(['middleware'=> 'cors'], function() {
    Route::get('/check', function (Request $req) {
        $vendors = new Vendor();
        $vendor = $vendors->getByToken($req->token);
        if(!$vendor)
            return [
                'code' => 0,
                'msg' => 'Token is not valid'
            ];
        $couples = new Couple();
        $vendorCouples = $couples->getByVendorId($vendor->GUID);
        //check if token exist in db
        if(count($vendorCouples)>0) {
            foreach($vendorCouples as $couple) {

                try {
                    $subFolder = ['/'. $couple->SUBFOLDER, '/'.$couple->SUBFOLDER.'/'] ;
                    $subFolder2 = $couple->SUBFOLDER2;
                    $vendorId = $couple->MSVENDOR_GUID;
                    $url = $couple->vendor->VENDOR_WEBSITE;
                    //check is current_url is an URL (to detact script)
                    if(!filter_var($req->current_url, FILTER_VALIDATE_URL))
                        return [
                            'code' => 0,
                            'msg' => 'Your current url is not valid'
                        ];
                    
                    $currentUrl = parse_url($req->current_url);
                    //change in server
                    $currentUrlFull = $currentUrl['scheme'] . '://' . $currentUrl['host'];
                    //check are current_url and path in database exist?
                    if($currentUrlFull === $url && in_array($currentUrl['path'],$subFolder))
                        return [
                            'code' => 1,
                            'msg' => 'Url is valid',
                            'data' => [
                                'query' => $subFolder2
                            ]
                        ];
                    else 
                        return [
                            'code' => 0,
                            'msg' => 'Url is not valid'
                        ];
                }
                catch(\Exception $e) {

                    return [
                        'code' => 0,
                        'msg' => $e->getMessage()
                    ];
                }
            }
        }
        else {
            return [
                'code' => 0,
                'msg' => 'Url is not valid'
            ];
        }
    });
});

/**
 * ADMIN SYSTEM
 */
Route::get("/couples", "CoupleController@showIndex")->name("showCouples");
Route::get("/couples/publish", "CoupleController@publish")->name("publish");
Route::get("/couples/create", "CoupleController@showCreate")->name("showCreateCouple");
Route::get("/couples/{id}", "CoupleController@showCouple")->name("showCouple");
Route::delete("/couples/{id}", "CoupleController@dropById")->name("dropCouple");
Route::get("/couples/{coupleId}/edit", "CoupleController@showEdit")->name("showEditCouple");

Route::get("/profile", "VendorController@showProfile")->name("showProfile");
Route::get("/profile/change-password", "VendorController@showChangePassword")->name("showChangePassword");

Route::delete("/messages/{id}", "MessageController@dropById")->name("dropMessage");
Route::delete("/wedding-partner/{id}", "WeddingPartnerController@dropById")->name("dropWeddingPartner");


Route::get("/login", "Auth\LoginController@showLoginForm")->name("viewLogin");
Route::post("/login", "Auth\LoginController@login")->name("login");
Route::get("/register", "Auth\RegisterController@showRegistrationForm")->name("viewRegister");
Route::post("/register", "Auth\RegisterController@register")->name("register");
Route::post("/logout", "Auth\LoginController@logout")->name("logout");
Route::get("/forgot-password", "Auth\LoginController@showForgotPassword")->name("forgotPassword");
Route::get("/change-password", "Auth\LoginController@showChangePassword")->name("changePassword");

Route::post("/save/couple", "CoupleController@save")->name("saveCouple");
Route::post("/save/wedding", "WeddingController@save")->name("saveWedding");
Route::post("/save/wedding-partner", "WeddingPartnerController@save")->name("saveWeddingPartner");


Route::post("/api/upload-image", "ImageUploaderApi@upload")->name("upload");
Route::delete("/api/upload-image/{id}", "ImageUploaderApi@dropGalleryById")->name("dropGalleryById");
