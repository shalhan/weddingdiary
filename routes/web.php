<?php
use Illuminate\Http\Request;

use App\Couple;
use App\Wedding;
use App\Message;
use App\Vendor;
use App\VendorMenuVisit;
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
// $DEV_CURRENT_URL = "http://localhost:8888";



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
        'MSVENDORMENU_GUID'=>$req->vendor_id,
        'IPPUBLIC' => $clientData["ipAddress"]
    ];
    $vendorMenuVisitors = new VendorMenuVisit();
    $vendorMenuVisitors->create($data);
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
                    $url = "http://localhost";

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

Route::get("/weddings", "WeddingController@showIndex")->name("showWedding");
Route::get("/weddings/create", "WeddingController@showCreate")->name("showCreateWedding");
Route::get("/dashboard", "DashboardController@showIndex")->name("showDashboard");

Route::get("/profile", "VendorController@showProfile")->name("showProfile");
Route::get("/profile/change-password", "VendorController@showChangePassword")->name("showChangePassword");

Route::get("/login", "Auth\LoginController@showLoginForm")->name("login");
Route::get("/change-password", "Auth\LoginController@showLoginForm")->name("changePassword");

Route::post("/save/couple", "CoupleController@save")->name("saveCouple");


