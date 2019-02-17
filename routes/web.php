<?php
use Illuminate\Http\Request;

use App\Couple;
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
    $couple = new Couple();
    $selectedCouple = $couple->getByToken($req->token);
    if(!$selectedCouple)
        abort(404);

    $subFolder2 = $selectedCouple->SUBFOLDER2;
    $vendorId = $selectedCouple->MSVENDOR_GUID;
    $token = $selectedCouple->TOKEN;
    foreach($req->query() as $key => $value) {
        if($key . '=' . $value == $subFolder2)
            return view('index');
    }
    
    abort(404);
});

Route::group(['middleware'=> 'cors'], function() use ($DEV_CURRENT_URL) {
    Route::get('/check', function (Request $req) use ($DEV_CURRENT_URL) {
        $couple = new Couple();
        $selectedCouple = $couple->getByToken($req->token);
        //check if token exist in db
        if($selectedCouple) {
            try {
                $subFolder = ['/'. $selectedCouple->SUBFOLDER, '/'.$selectedCouple->SUBFOLDER.'/'] ;
                $subFolder2 = $selectedCouple->SUBFOLDER2;
                $vendorId = $selectedCouple->MSVENDOR_GUID;
                $url = $selectedCouple->vendor->VENDOR_WEBSITE;
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
                if($currentUrlFull === $url && in_array($currentUrl['path'],$subFolder) && $currentUrl['query'] == $subFolder2)
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
        else {
            \Log::info("TOKEN TIDAK SAMA");
            return [
                'code' => 0,
                'msg' => 'Url is not valid'
            ];
        }
    });
});


