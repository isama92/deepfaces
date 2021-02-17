<?php


namespace PugMi\DeepFaces\Services;


use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class DeepFacesService
{
    /**
     * @param int|null $qty
     * @return array
     */
    public function loadImages(?int $qty): array
    {
        $qty = $qty ?? config('deepfaces.default_qty');

        $imgs = [];

        foreach (range(1, $qty) as $i) {
            $result = Http::get('https://thispersondoesnotexist.com/image')->body();
            $imgs[] = (string)Image::make($result)
                ->resize(config('deepfaces.default_size'), null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('data-url');
        }
        return $imgs;
    }
}