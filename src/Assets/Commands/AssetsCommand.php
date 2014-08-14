<?php namespace Walis\Assets\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command;

abstract class AssetsCommand extends Command {

    public function __construct()
    {
        parent::__construct();
    }

}
