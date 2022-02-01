<?php

namespace App\Console\Commands;

use App\Models\ErrorLog;
use App\Models\Post;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Console\Command;

class Feed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:feed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'COMMAND FOR IMPORTING BLOG POSTS FROM EXTERNAL SOURCE. INTO OUR APPLICATION';

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

            /* 1. Create a new instance of the Curl class.
            2. Set the URL to the URL of the blog posts API feed.
            3. Set the HTTP method to GET.
            4. Set the HTTP header cache-control to no-cache.
            5. Execute the request and store the response in . */
            $request = Curl::to(getSetting('BLOG_POSTS_API_FEED'), PHP_URL_PATH)
                ->withHeader('cache-control: no-cache')
                ->get();

            /* This code is taking the JSON response from the API and converting it into a PHP array. */
            $response = collect(json_decode($request, true));

            foreach ($response['data'] as $data) {
                /* Create a new post with the given data. */
                Post::create([
                    'title'            => $data['title'],
                    'description'      => $data['description'],
                    'publication_date' => $data['publication_date']
                ]);
            }

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
