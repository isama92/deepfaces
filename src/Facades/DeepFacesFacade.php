<?php


namespace PugMi\DeepFaces\Facades;


class DeepFacesFacade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'deepfaces';
    }

}