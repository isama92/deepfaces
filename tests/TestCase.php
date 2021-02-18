<?php


namespace Tests;


use Intervention\Image\ImageServiceProvider;
use PugMi\DeepFaces\DeepFacesServiceProvider;
use PugMi\DeepFaces\Facades\DeepFacesFacade;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function getPackageProviders($application)
    {
        return [
            DeepFacesServiceProvider::class,
            ImageServiceProvider::class,
        ];
    }

    public function getPackageAliases($application)
    {
        return [
            'DeepFaces' => DeepFacesFacade::class,
        ];
    }


    /** @test */
    public function it_returns_true()
    {
        $this->assertTrue(true);
    }

}