<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'access.panel',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:18:22',
                'updated_at' => '2022-05-04 23:18:22',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'brand.viewAny',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:18:47',
                'updated_at' => '2022-05-04 23:18:47',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'brand.view',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:19:07',
                'updated_at' => '2022-05-04 23:19:07',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'brand.update',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:24:05',
                'updated_at' => '2022-05-04 23:24:05',
            ),
            4 => 
            array (
                'id' => 9,
                'name' => 'brand.delete',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:26:19',
                'updated_at' => '2022-05-04 23:26:19',
            ),
            5 => 
            array (
                'id' => 10,
                'name' => 'brand.create',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:26:42',
                'updated_at' => '2022-05-04 23:26:42',
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'permission.viewAny',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:26:54',
                'updated_at' => '2022-05-04 23:26:54',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'permission.view',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:27:01',
                'updated_at' => '2022-05-04 23:27:01',
            ),
            8 => 
            array (
                'id' => 13,
                'name' => 'permission.create',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:27:06',
                'updated_at' => '2022-05-04 23:27:06',
            ),
            9 => 
            array (
                'id' => 14,
                'name' => 'permission.update',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:27:12',
                'updated_at' => '2022-05-04 23:27:12',
            ),
            10 => 
            array (
                'id' => 15,
                'name' => 'permission.delete',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:27:16',
                'updated_at' => '2022-05-04 23:27:16',
            ),
            11 => 
            array (
                'id' => 16,
                'name' => 'product.viewAny',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:27:49',
                'updated_at' => '2022-05-04 23:27:49',
            ),
            12 => 
            array (
                'id' => 17,
                'name' => 'product.view',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:01',
                'updated_at' => '2022-05-04 23:28:01',
            ),
            13 => 
            array (
                'id' => 18,
                'name' => 'product.create',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:05',
                'updated_at' => '2022-05-04 23:28:05',
            ),
            14 => 
            array (
                'id' => 19,
                'name' => 'product.update',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:08',
                'updated_at' => '2022-05-04 23:28:08',
            ),
            15 => 
            array (
                'id' => 20,
                'name' => 'product.delete',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:11',
                'updated_at' => '2022-05-04 23:28:11',
            ),
            16 => 
            array (
                'id' => 21,
                'name' => 'role.viewAny',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:21',
                'updated_at' => '2022-05-04 23:28:21',
            ),
            17 => 
            array (
                'id' => 22,
                'name' => 'role.view',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:24',
                'updated_at' => '2022-05-04 23:28:24',
            ),
            18 => 
            array (
                'id' => 23,
                'name' => 'role.create',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:29',
                'updated_at' => '2022-05-04 23:28:29',
            ),
            19 => 
            array (
                'id' => 24,
                'name' => 'role.update',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:32',
                'updated_at' => '2022-05-04 23:28:32',
            ),
            20 => 
            array (
                'id' => 25,
                'name' => 'role.delete',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:35',
                'updated_at' => '2022-05-04 23:28:35',
            ),
            21 => 
            array (
                'id' => 26,
                'name' => 'user.viewAny',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:42',
                'updated_at' => '2022-05-04 23:28:42',
            ),
            22 => 
            array (
                'id' => 27,
                'name' => 'user.view',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:45',
                'updated_at' => '2022-05-04 23:28:45',
            ),
            23 => 
            array (
                'id' => 28,
                'name' => 'user.create',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:48',
                'updated_at' => '2022-05-04 23:28:48',
            ),
            24 => 
            array (
                'id' => 29,
                'name' => 'user.update',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:52',
                'updated_at' => '2022-05-04 23:28:52',
            ),
            25 => 
            array (
                'id' => 30,
                'name' => 'user.delete',
                'guard_name' => 'web',
                'created_at' => '2022-05-04 23:28:56',
                'updated_at' => '2022-05-04 23:28:56',
            ),
        ));
        
        
    }
}