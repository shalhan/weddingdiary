<?php
use Illuminate\Http\Request;

use App\Couple;
use App\Wedding;
use App\Message;
use App\Vendor;

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
$DEV_CURRENT_URL = "http://localhost:8888";



Route::get('/', function (Request $req) use ($DEV_CURRENT_URL) {
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
            if($key . '=' . $value == $subFolder2)
                return view('templates.'.$couple->MSTEMPLATE_GUID, compact('couple', 'wedding', 'messages', 'template'));
        }
    }
    abort(404);
});

Route::group(['middleware'=> 'cors'], function() use ($DEV_CURRENT_URL) {
    Route::get('/check', function (Request $req) use ($DEV_CURRENT_URL) {
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
        if($vendorCouples) {
            foreach($vendorCouples as $couple) {

                try {
                    $subFolder = ['/'. $couple->SUBFOLDER, '/'.$couple->SUBFOLDER.'/'] ;
                    $subFolder2 = $couple->SUBFOLDER2;
                    $vendorId = $couple->MSVENDOR_GUID;
                    // $url = $couple->vendor->VENDOR_WEBSITE;
                    $url = $DEV_CURRENT_URL;
                    //check is current_url is an URL (to detact script)
                    if(!filter_var($req->current_url, FILTER_VALIDATE_URL))
                        return [
                            'code' => 0,
                            'msg' => 'Your current url is not valid'
                        ];
                    
                    $currentUrl = parse_url($req->current_url);
                    //change in server
                    $currentUrlFull = $currentUrl['scheme'] . '://' . $currentUrl['host'] . ':' . $currentUrl['port'];
                    //check are current_url and path in database exist?
                    \Log::info($url);
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
            \Log::info("TOKEN TIDAK SAMA");
            return [
                'code' => 0,
                'msg' => 'Url is not valid'
            ];
        }
    });
});


