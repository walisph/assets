<?php namespace Walis\Assets\Commands;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AssetsCleanCommand extends AssetsCommand {

    protected $directory;

    /**
     * @var \Illuminate\Filesystem\Filesystem;
     */
    protected $filesystem;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($filesystem)
    {
        parent::__construct();
        $this->directory = [
            'storage' => storage_path( 'assets' ),
            'vendor'  => app_path( 'assets/vendor' ),
            'public'  => public_path( 'assets' )
        ];
        $this->filesystem = $filesystem;
    }


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
            return $this->directory( $this->argument() );
        }
    }

    protected function directory( $directory = null )
    {
        switch ( $directory ) {
            case 'storage':
                $this->info('Cleaning assets library in storage.');
                $count = 0;
                foreach ($this->filesystem->files( $this->directory['storage'] ) as $file)
                {
                    $this->filesystem->delete($file);
                    $count++;
                }
                $this->info($count .' files removed');
                break;

            case 'vendor':
                $this->info('Cleaning libraries in the application assets vendor directory.');
                $count = 0;
                foreach ($this->filesystem->directories( $this->directory['vendor'] ) as $directory)
                {
                    $this->filesystem->deleteDirectory($directory);
                    $count++;
                }
                $this->info($count .' directory removed');
                break;

            case 'public':
                $this->info('Cleaning assets directory in public.');
                $this->filesystem->deleteDirectory( $this->directory['public'] );
                $this->info($this->directory['public'] . 'directory removed');
                break;

            default:
                $this->directory('storage');
                $this->directory('vendor');
                $this->directory('vendor');
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
        return array(
            ['directory', 'd', InputOption::VALUE_OPTIONAL, 'Directory to be clean']
        );
    }

    protected function getArguments()
    {
        return array(
            ['storage', InputArgument::OPTIONAL, 'Clean your assets storage'],
            ['vendor', InputArgument::OPTIONAL, 'Clean your assets vendor directory'],
            ['public', InputArgument::OPTIONAL, 'Clean your assets in public directory']
        );
    }
}
