<?php

namespace App\Console\Commands;

use App\Models\ErrorLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Seed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the applications main database tables';

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
            // logic for looping database tables though Orange hill's iseed commands.
            Artisan::call('iseed settings,roles,abilities,ability_role --force');
            // optional
            // Artisan::call('iseed users,posts,post_user --force');

            return Command::SUCCESS;

        } catch (\Throwable $th) {
            // throw $th;
            ErrorLog::create([
                'title'       => strtoupper($this->description),
                '_class'      => get_class($this),
                'description' => $th->getMessage()
            ]);

            return Command::FAILURE;
        }
    }
}
