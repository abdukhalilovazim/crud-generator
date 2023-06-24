<?php

namespace App\Console\Commands;

use App\Http\Controllers\Controller;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ControllerGenerator extends Command
{
    /*
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "api:user {param} {version=V1}";

    /*
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command generates crud with docs for controller';

    /*
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {

        parent::__construct();
    }

    /*
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        echo "Start . . .\n";
        $param = $this->argument('param');
        $version = strtoupper($this->argument('version'));
        $text = file_get_contents("controller_generator.txt",true);
        $controller = new Controller();
        $controller->makeController($param,$version,'User', $text);
        echo "Finish task!";
        return 0;
    }
}
