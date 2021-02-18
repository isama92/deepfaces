<?php


namespace PugMi\DeepFaces\Services;


use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class DeepFaces
{
    public function getFaces(?int $qty)
    {
        $qty = $qty ?? config('deepfaces.default_face_number');

        $imgs = [];

        foreach (range(1, $qty) as $i) {
            $result = Http::get(config('deepfaces.url'))->body();
            $imgs[] = (string)Image::make($result)
                ->resize(config('deepfaces.default_size'), null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('data-url');
        }

        return $imgs;
    }
}