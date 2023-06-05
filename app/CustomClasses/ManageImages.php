<?php

namespace App\CustomClasses;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class ManageImages
{
    public static function processImage($image, $image_max_size, $destination_path, $image_tag, $resizing_x_ratio, $resizing_y_ratio): string
    {
        $image_name = "$image_tag-" . time() . '-' . $image->getClientOriginalName();
        $image_size = $image->getSize();

        if ($image_size < $image_max_size) {
            $image->move($destination_path, $image_name);
        } else {

            Log::info('Vehicle Image size in bytes --- ' . $image_size);
            $image = Image::make($image->getRealPath());
            $height = $image->height() / $resizing_y_ratio;
            $width = $image->width() / $resizing_x_ratio;
            $image->resize($width, $height)->save($destination_path . '/' . $image_name);
        }

        return $image_name;

    }


}
