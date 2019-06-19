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
    private const RESIZE_WIDTH = 200;
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
            } else if($req->type == "COVER1" || $req->type == "COVER2" || $req->type == "COVER3") {
                $index = $req->index;
                $path = $vendorDir .'/' . $coupleDir . '/slider/' . $index . "." . $type;
                $res = $this->imageUploaderService->saveCover($req->coupleId, $path, $index);
            } else if($req->type == "GALLERY") {
                $path = $vendorDir .'/' . $coupleDir . '/gallery/1/' . $imageName;
                $thumbPath = $vendorDir .'/' . $coupleDir . '/gallery/1/thumb/' . $imageName;
                $res = $this->imageUploaderService->saveGallery($req->coupleId, $path);
            }

            if(!isset($res["errors"])) {
                if(isset($res["data"]["prevPath"])) {
                    Storage::delete(str_replace('/images/', "", $res["data"]["prevPath"]));
                }
                if($req->type == "GALLERY"){
                    $resizeImage  = Image::make($data)->resize(self::RESIZE_WIDTH, null, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $resizeImage->save(public_path('images/'.$thumbPath));

                    \Log::info("MASUK KE RESIZE " . $thumbPath);
                }
                Storage::put($path, $data);
            }
            return response()->json($res);
        } else {
            throw new \Exception('did not match data URI with image data');
        }
    }

    public function dropGalleryById($id) {
        $res = $this->imageUploaderService->dropGalleryById($id);
        Storage::delete(str_replace('/images/', "", $res["data"]["prevPath"]));
        return redirect()->back();
    }
}