<?php

namespace App\traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image; 

trait ImageHelper
{
    function uploadImage($image, $path, $size, $name)
    {
        $name = str_replace(' ', '', $name);
        $filename = $name . '_' . time() . '_' . '.' . $image->getClientOriginalExtension();
        $path = public_path($path . $filename);
        Image::make($image->getRealPath())->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 100);

        return $filename;
    }
    function deleteImage($image)
    {
        if (File::exists($image)) {
            unlink($image);
        }
    }
}
