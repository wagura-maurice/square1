<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'administrator',
                'description' => NULL,
                '_status' => 1,
                'created_at' => '2022-02-01 19:52:59',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'manager',
                'description' => NULL,
                '_status' => 1,
                'created_at' => '2022-02-01 19:52:59',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'guest',
                'description' => NULL,
                '_status' => 1,
                'created_at' => '2022-02-01 19:52:59',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}