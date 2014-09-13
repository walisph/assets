<?php namespace Walisph\Assets\Console;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AssetsCleanCommand extends AssetsCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'assets:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleaning all assets';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        if( $this->option('directory') )
        {
            return $this->directory( $this->option('directory') );
        }
        else
        {
            return $this->directory();
        }
    }

    /**
     * Depends on the directory
     *
     * @param  $directory
     * @return mixed
     */
    protected function directory( $directory = null )
    {
        switch ( $directory ) {
            case 'storage':
                $this->comment('Cleaning assets library in storage.');
                $count = 0;
                foreach ($this->filesystem->files( $this->directory['storage'] ) as $file)
                {
                    $this->filesystem->delete($file);
                    $count++;
                }
                $this->info($count .' files removed');
            break;

            case 'public':
                $this->comment('Cleaning assets directory in public.');
                $this->filesystem->deleteDirectory( $this->directory['public'] );
                $this->info('Assets directory in public has been removed');
            break;

            default:
                $this->directory('storage');
                $this->directory('public');
            break;
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['directory', 'd', InputOption::VALUE_OPTIONAL, 'Directory to be clean']
        ];
    }

}
