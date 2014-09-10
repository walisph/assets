<?php namespace Walisph\Assets\Console;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AssetsImportCommand extends AssetsCommand
{
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
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $name = explode( "/", $this->argument('name') );
        if( count( $name ) > 1 )
        {
            // If the array have more than 1 key/value
            $path = $name[0] . DIRECTORY_SEPARATOR . $name[1];

            if( $this->filesystem->exists( $this->directory['vendor'] . DIRECTORY_SEPARATOR . $path ) )
            {
                $this->filesystem->copyDirectory(
                    $this->directory['vendor'] . DIRECTORY_SEPARATOR . $path,
                    assets_path( 'libraries' . DIRECTORY_SEPARATOR . $name[1] )
                );
                $this->info( '['. $name[0] .'/'. $name[1] .'] is successfully imported into the assets libraries');
            }
            else
            {
                throw new \InvalidArgumentException( 'Sorry, we can not import because the path ['. $path .'] does not exists' );
            }
        }
        else
        {
            // If the array only have 1 key/value
            $path = $name[0];

            if( $this->filesystem->exists( $this->directory['vendor'] . DIRECTORY_SEPARATOR . $path ) )
            {
                $this->filesystem->copyDirectory(
                    $this->directory['vendor'] . DIRECTORY_SEPARATOR . $path,
                    assets_path( 'libraries' . DIRECTORY_SEPARATOR . $path )
                );
                $this->info( '['. $path .'] is successfully imported into the assets libraries');
            }
            else
            {
                throw new \InvalidArgumentException( 'Sorry, we can not import because the path ['. $path .'] does not exists' );
            }
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
