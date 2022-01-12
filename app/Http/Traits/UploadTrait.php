<?php 

namespace App\Http\Traits;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

trait UploadTrait {
    public function imageUpload($image) {
        return Cloudinary::upload($image->getRealPath(), [
                'transformation' => [
                    'width' => 640,
                    'height' => 480,
                    'quality' => "auto",
                    'fetch_format' => "auto"
                    ]])->getSecurePath();
    }
}
