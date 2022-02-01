<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    /**
     * @return void
     */
    public function testCreatePostsFromHttpRequest(): void
    {
        /* We're going to use the withoutExceptionHandling() method to disable the default exception
        handling provided by Laravel. Then we're going to use the json() method to send a JSON
        request to the store route. Finally, we're going to use the assertSuccessful() method to
        verify that the response was successful. */
        $this->withoutExceptionHandling()
            ->json('post', route('posts.store'), Post::factory()->raw())
            ->assertSuccessful();
    }

    /**
     * @return void
     */
    public function testCreatePostsFromFeedCommand(): void
    {
        /* The above code is running the command `app:feed` from the Artisan. */
        $this->artisan('app:feed')->assertExitCode(0);
    }
}
