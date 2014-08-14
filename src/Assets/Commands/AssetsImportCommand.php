<?php namespace Walis\Assets\Commands;

use Symfony\Component\Console\Input\InputArgument;

class AssetsImportCommand extends AssetsCommand {

    /**
     * @var \Illuminate\Filesystem\Filesystem;
     */
    protected $filesystem;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'assets:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assets Importer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $name = explode( "/", $this->argument('name') );
        $path = $name[0] . DIRECTORY_SEPARATOR . $name[1];
        if( $this->filesystem->exists( base_path( 'vendor' . DIRECTORY_SEPARATOR . $path ) ) )
        {
            $this->filesystem->copyDirectory(
                base_path( 'vendor'. DIRECTORY_SEPARATOR . $name[0] . DIRECTORY_SEPARATOR . $name[1] ),
                assets_path( 'lib'. DIRECTORY_SEPARATOR . $name[1] )
            );
            $this->info( '['. $name[0] .'/'. $name[1] .'] is successfully imported into the assets library' );
        }
        else
        {
            throw new \InvalidArgumentException( 'Sorry, we can not import because the path ['. $path .'] does not exists' );
            // $this->error( 'Sorry, we can not be imported because the path ['. $path .'] does not exists' );
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('name', InputArgument::REQUIRED, 'Library name.'),
        );
    }

}
