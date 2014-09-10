<?php namespace Walisph\Assets;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Walisph\Assets\Console\AssetsCommand;
use Walisph\Assets\Console\AssetsCleanCommand;
use Walisph\Assets\Console\AssetsImportCommand;

class AssetsServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Booting
     */
    public function boot()
    {
        $this->package('walisph/assets');
    }

    /**
     * Register the commands
     *
     * @return void
     */
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
            return new AssetsCleanCommand();
        });

        $this->commands('assets.clean');
    }

    protected function registerImport()
    {
        $this->app['assets.import'] = $this->app->share(function($app)
        {
            return new AssetsImportCommand();
        });

        $this->commands('assets.import');
    }

}
