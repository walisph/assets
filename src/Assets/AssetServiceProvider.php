<?php namespace Walis\Assets;

use Illuminate\Support\ServiceProvider;
use Walis\Assets\Commands\AssetsCleanCommand;
use Walis\Assets\Commands\AssetsImportCommand;
use Illuminate\Filesystem\Filesystem;

class AssetServiceProvider extends ServiceProvider {

    public function register()
    {
        foreach([
            'Clean',
            'Import'] as $command)
        {
            $this->{"register$command"}();
        }
    }

    protected function registerClean()
    {
        $this->app['assets.clean'] = $this->app->share(function($app)
        {
            return new AssetsCleanCommand(new Filesystem);
        });

        $this->commands('assets.clean');
    }

    protected function registerImport()
    {
        $this->app['assets.import'] = $this->app->share(function($app)
        {
            return new AssetsImportCommand(new Filesystem);
        });

        $this->commands('assets.import');
    }

}

