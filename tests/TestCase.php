<?php


namespace Tests;


use Intervention\Image\ImageServiceProvider;
use PugMi\DeepFaces\DeepFacesServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /** @test */
    public function it_returns_true()
    {
        $this->assertTrue(true);
    }

    protected function getPackageProviders($app)
    {
        return [
            DeepFacesServiceProvider::class,
            ImageServiceProvider::class,
        ];
    }


}