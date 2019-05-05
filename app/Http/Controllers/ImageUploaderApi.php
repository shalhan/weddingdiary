<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Services\ImageUploaderService;
use App\Http\Repositories\ImageUploaderRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Image;
use Auth;

class ImageUploaderApi extends Controller {
    private $imageUploaderService;
    public function __construct() {
        $imageUploaderRepo = new ImageUploaderRepository();
        $this->imageUploaderService = new ImageUploaderService($imageUploaderRepo);
    }
    /**
     * Upload image
     * /api/upload-image?type=cover
     * @param Request $req
     */
    public function upload(Request $req) {
        if (preg_match('/^data:image\/(\w+);base64,/', $req->imageBase64, $type)) {
            $data = substr($req->imageBase64, strpos($req->imageBase64, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif
        
            if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                throw new \Exception('invalid image type');
            }
        
            $data = base64_decode($data);
        
            if ($data === false) {
                throw new \Exception('base64_decode failed');
            }

            $imageName = time()."." .$type;
            $vendorDir = "ven".Auth::user()->GUID;
            $coupleDir = "coup".$req->coupleId;

            if($req->type == "BRIDE") {
                $path = $vendorDir .'/' . $coupleDir . "/bride/" . $imageName;
                $res = $this->imageUploaderService->saveBridePhoto($req->coupleId, $path);
            } else if($req->type == "GROOM") {
                $path = $vendorDir .'/' . $coupleDir . "/groom/" . $imageName;
                $res = $this->imageUploaderService->saveGroomPhoto($req->coupleId, $path);
            } else if($req->type == "COVER") {
                $path = $vendorDir .'/' . $coupleDir . '/' . $imageName;
                $res = $this->imageUploaderService->saveCover($req->coupleId, $path);
            }
            if(!isset($req["errors"])) {
                if(isset($res["data"]["prevPath"])) {
                    Storage::delete(str_replace('/images/', "", $res["data"]["prevPath"]));
                }
                \Log::info($res["data"]["prevPath"]);
                Storage::put($path, $data);
            }
            return response()->json($res);
        } else {
            throw new \Exception('did not match data URI with image data');
        }
    }
}