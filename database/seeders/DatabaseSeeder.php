<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(SettingsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AbilitiesTableSeeder::class);
        $this->call(AbilityRoleTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);

        // create square1 administrator user.
        \App\Models\User::factory()->create([
            'name'  => 'administrator',
            'email' => 'administrator@square1.io'
        ])->assignRole('administrator');

        // create square1 manager user.
        \App\Models\User::factory()->create([
            'name'  => 'manager',
            'email' => 'manager@square1.io'
        ])->assignRole('manager');

        // create square1 guest user.
        \App\Models\User::factory()->create([
            'name'  => 'guest',
            'email' => 'guest@square1.io'
        ])->assignRole('guest');
    }
}
