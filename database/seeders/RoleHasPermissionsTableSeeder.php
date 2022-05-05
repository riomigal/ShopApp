<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 5,
                'role_id' => 3,
            ),
            1 => 
            array (
                'permission_id' => 5,
                'role_id' => 4,
            ),
            2 => 
            array (
                'permission_id' => 6,
                'role_id' => 3,
            ),
            3 => 
            array (
                'permission_id' => 6,
                'role_id' => 4,
            ),
            4 => 
            array (
                'permission_id' => 7,
                'role_id' => 3,
            ),
            5 => 
            array (
                'permission_id' => 7,
                'role_id' => 4,
            ),
            6 => 
            array (
                'permission_id' => 8,
                'role_id' => 3,
            ),
            7 => 
            array (
                'permission_id' => 8,
                'role_id' => 4,
            ),
            8 => 
            array (
                'permission_id' => 9,
                'role_id' => 3,
            ),
            9 => 
            array (
                'permission_id' => 9,
                'role_id' => 4,
            ),
            10 => 
            array (
                'permission_id' => 10,
                'role_id' => 3,
            ),
            11 => 
            array (
                'permission_id' => 10,
                'role_id' => 4,
            ),
            12 => 
            array (
                'permission_id' => 11,
                'role_id' => 3,
            ),
            13 => 
            array (
                'permission_id' => 12,
                'role_id' => 3,
            ),
            14 => 
            array (
                'permission_id' => 13,
                'role_id' => 3,
            ),
            15 => 
            array (
                'permission_id' => 14,
                'role_id' => 3,
            ),
            16 => 
            array (
                'permission_id' => 15,
                'role_id' => 3,
            ),
            17 => 
            array (
                'permission_id' => 16,
                'role_id' => 3,
            ),
            18 => 
            array (
                'permission_id' => 16,
                'role_id' => 4,
            ),
            19 => 
            array (
                'permission_id' => 17,
                'role_id' => 3,
            ),
            20 => 
            array (
                'permission_id' => 17,
                'role_id' => 4,
            ),
            21 => 
            array (
                'permission_id' => 18,
                'role_id' => 3,
            ),
            22 => 
            array (
                'permission_id' => 18,
                'role_id' => 4,
            ),
            23 => 
            array (
                'permission_id' => 19,
                'role_id' => 3,
            ),
            24 => 
            array (
                'permission_id' => 19,
                'role_id' => 4,
            ),
            25 => 
            array (
                'permission_id' => 20,
                'role_id' => 3,
            ),
            26 => 
            array (
                'permission_id' => 20,
                'role_id' => 4,
            ),
            27 => 
            array (
                'permission_id' => 21,
                'role_id' => 3,
            ),
            28 => 
            array (
                'permission_id' => 22,
                'role_id' => 3,
            ),
            29 => 
            array (
                'permission_id' => 23,
                'role_id' => 3,
            ),
            30 => 
            array (
                'permission_id' => 24,
                'role_id' => 3,
            ),
            31 => 
            array (
                'permission_id' => 25,
                'role_id' => 3,
            ),
            32 => 
            array (
                'permission_id' => 26,
                'role_id' => 3,
            ),
            33 => 
            array (
                'permission_id' => 27,
                'role_id' => 3,
            ),
            34 => 
            array (
                'permission_id' => 28,
                'role_id' => 3,
            ),
            35 => 
            array (
                'permission_id' => 29,
                'role_id' => 3,
            ),
            36 => 
            array (
                'permission_id' => 30,
                'role_id' => 3,
            ),
        ));
        
        
    }
}