<?php


namespace PugMi\DeepFaces;


class DeepFacesServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom($this->getPackagePath() . '/config/deepfaces.php', 'deepfaces');
    }

    public function boot()
    {
        $this->loadRoutesFrom($this->getPackagePath() . '/routes/web.php');

        $this->loadViewsFrom($this->getPackagePath() . '/resources/views', 'deepfaces');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    private function getPackagePath()
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