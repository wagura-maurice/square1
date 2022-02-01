<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'item' => 'SYSTEM_LOGO_IMAGE',
                'default_value' => 'https://www.notion.so/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2F334f6f31-9321-48d9-b03a-54be6a60b556%2F91470814224_1da55a8ce7e4027cbba6_132.jpg?table=block&id=0cdf0bb1-015d-4e5c-94b6-2b3fe61ee621&spaceId=036584dc-1616-4e3f-ba0b-d07c83a4c7a0&width=250&userId=&cache=v2',
                'current_value' => NULL,
                '_status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-02-01 19:52:59',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'item' => 'BLOG_POSTS_API_FEED',
                'default_value' => 'https://sq1-api-test.herokuapp.com/posts',
                'current_value' => NULL,
                '_status' => 1,
                'deleted_at' => NULL,
                'created_at' => '2022-02-01 19:52:59',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}