<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * @return void
     */
    public function testUserCanLoginFromHttpApi(): void
    {
        $user = [
            'email' => 'administrator@square1.io',
            'password' => bcrypt('password')
        ];
        
        $this->assertDatabaseHas('users', ['email' => $user['email']]);

        $this->withoutExceptionHandling()
            ->withoutMiddleware()
            ->json('post', route('authentication.login'), $user);
            /* ->assertExactJson([
                'message' => 'Confirm account',
            ]); */
    }

    /**
     * @return void
     */
    public function testUserCanRegisterFromHttpApi(): void
    {
        $user = User::factory()->raw([
            'password' => 'password'
        ]);

        unset($user['email_verified_at']);
        unset($user['remember_token']);
        
        $this->assertDatabaseMissing('users', ['email' => $user['email']]);

        $this->withoutExceptionHandling()
            ->withoutMiddleware()
            ->json('post', route('authentication.register'), $user);
            /* ->assertExactJson([
                'message' => 'Confirm account',
            ]); */

        $this->assertDatabaseHas('users', ['email' => $user['email']]);
    }
}
