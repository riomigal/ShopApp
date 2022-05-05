<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'saverio.migale@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$QtllFcdTjz6WUar4LEtlvurWIgbXEzk8ThOOlHttW.3xQHheHCvs6',
                'remember_token' => NULL,
                'created_at' => '2022-05-04 16:01:55',
                'updated_at' => '2022-05-04 16:01:55',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Seller',
                'email' => 'saverio.migale@hotmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$fCn/q4nujnTuIJ93flvny.Srjpxj9l20Q5Az70qpNGzZkKvKDYQKi',
                'remember_token' => NULL,
                'created_at' => '2022-05-04 23:40:56',
                'updated_at' => '2022-05-04 23:40:56',
            ),
        ));
        
        
    }
}