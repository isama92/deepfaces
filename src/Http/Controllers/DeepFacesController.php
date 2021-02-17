<?php


namespace PugMi\DeepFaces\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use PugMi\DeepFaces\Services\DeepFacesService;

class DeepFacesController
{
    public function __invoke(?int $qty, DeepFacesService $deepFacesService)
    {
        $imgs = $deepFacesService->loadImages($qty);

        $faces = $imgs;

        return view('deepfaces::index')->with(compact('faces'));
    }


}