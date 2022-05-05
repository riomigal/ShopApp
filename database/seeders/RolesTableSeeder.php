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
                'id' => 3,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:17:29',
                'updated_at' => '2022-05-04 23:32:45',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'seller',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:18:00',
                'updated_at' => '2022-05-04 23:18:00',
            ),
        ));
        
        
    }
}