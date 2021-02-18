<?php


namespace PugMi\DeepFaces\Http\Controllers;


use PugMi\DeepFaces\Services\DeepFaces;

class DeepFacesController
{
    public function __invoke(DeepFaces $deepFaces, $qty) {
        $faces = $deepFaces->getFaces($qty); // uses injected Service from Container
//        $faces = \DeepFaces::getFaces($qty); // uses Facade

        return view('deepfaces::index')->with(compact('faces'));
    }


}