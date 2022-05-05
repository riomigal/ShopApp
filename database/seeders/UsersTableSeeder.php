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

        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$QtllFcdTjz6WUar4LEtlvurWIgbXEzk8ThOOlHttW.3xQHheHCvs6',
                'remember_token' => NULL,
                'created_at' => '2022-05-04 16:01:55',
                'updated_at' => '2022-05-04 16:01:55',
            ),
        ));
    }
}