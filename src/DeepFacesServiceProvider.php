<?php


namespace PugMi\DeepFaces;

use Illuminate\Support\ServiceProvider;
use PugMi\DeepFaces\Services\DeepFaces;

class DeepFacesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom($this->packagePath() . '/config/deepfaces.php', 'deepfaces');
        $this->app->singleton('deepfaces', function (){ return new DeepFaces(); });
    }

    public function boot()
    {
        $this->loadRoutesFrom($this->packagePath() . '/routes/web.php');

        $this->loadViewsFrom($this->packagePath() . '/resources/views', 'deepfaces');
        
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    private function packagePath()
    {
        return __DIR__ . '/..';
    }

    private function bootForConsole()
    {
        $this->publishes(
            [
                $this->packagePath() . '/config/deepfaces.php' => config_path('deepfaces.php')
            ],
            'deepfaces.config'
        );

        $this->publishes(
            [
                $this->packagePath() . '/resources/views' => resource_path('views/vendor/deepfaces'),
                'deepfaces.views'
            ]
        );
    }
}