<?php

namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;

class ImageIntervention
{
    public static function imageIntervention($image): void
    {
        Image::make($image)
            ->resize(600, 600, function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->orientate()
            ->sharpen(5)
            ->save($image, '80', 'jpg')
            ->destroy();
    }
}
