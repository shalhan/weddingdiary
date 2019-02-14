<?php
use Illuminate\Http\Request;
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

$DEV_CURRENT_URL = "http://abphotographs.com";
// $DEV_CURRENT_URL = "http://localhost:8888";

Route::get('/', function (Request $req) use ($DEV_CURRENT_URL) {
    $couple = 'shalhan';
    $vendor_id = 1;
    $url = $DEV_CURRENT_URL;
    $path = '/diary';
    $token = '68501fe8d004ef236c0370ce97eef8d1';
    Log::info($req->fullUrl);
    // Token : md5(url+vendor_id)
    if($req->couple !== $couple || $req->token != $token)
        abort(404);
    
    return view('index');
    
});

Route::group(['middleware'=> 'cors'], function() use ($DEV_CURRENT_URL) {
    Route::get('/check', function (Request $req) use ($DEV_CURRENT_URL) {
        \Log::info("DEV  " . $DEV_CURRENT_URL);
        
        $couple = 'shalhan';
        $vendor_id = 1;
        $url = $DEV_CURRENT_URL;
        $path = '/diary';
        $token = '68501fe8d004ef236c0370ce97eef8d1';
    
        //check if token exist in db
        if($req->token == $token) {
            try {
                //check is current_url is an URL (to detact script)
                if(!filter_var($req->current_url, FILTER_VALIDATE_URL))
                    return [
                        'code' => 0,
                        'msg' => 'Your current url is not valid'
                    ];
                
                $current_url = parse_url($req->current_url);
                //check are current_url and path in database exist?
                if($DEV_CURRENT_URL === $url && $current_url['path'] === $path)
                    return [
                        'code' => 1,
                        'msg' => 'Url is valid'
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


