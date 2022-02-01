<?php

namespace App\Console\Commands;

use App\Models\ErrorLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Optimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimizing the application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            // logic for running laravel artisan commands.
            // Artisan::call('down');
            Artisan::call('cache:clear');
            // Artisan::call('auth:clear-resets');
            Artisan::call('route:clear');
            Artisan::call('route:cache');
            Artisan::call('config:clear');
            Artisan::call('config:cache');
            Artisan::call('view:clear');
            Artisan::call('view:cache');
            Artisan::call('storage:link');
            Artisan::call('optimize');
            // Artisan::call('up');
            // logic for running composer's commands.
            shell_exec('composer dump-autoload');
            // shell_exec('composer update');

            return Command::SUCCESS;

        } catch (\Throwable $th) {
            // throw $th->getMessage();
            ErrorLog::create([
                'title'       => strtoupper($this->description),
                '_class'      => get_class($this),
                'description' => $th->getMessage()
            ]);

            return Command::FAILURE;
        }
    }
}
