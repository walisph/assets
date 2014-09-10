<?php namespace Walisph\Assets\Console;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command;

abstract class AssetsCommand extends Command
{
    protected $directory;

    /**
     * @var \Illuminate\Filesystem\Filesystem;
     */
    protected $filesystem;

    public function __construct()
    {
        parent::__construct();
        $this->filesystem = new Filesystem; // TODO: with iOC
        $this->directory = [
            'storage' => storage_path( 'assets' ),
            'vendor'  => base_path( 'vendor' ),
            'public'  => public_path( 'assets' ),
            'assets'  => base_path( 'assets' )
        ];
    }

}
