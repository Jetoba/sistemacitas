<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

        // ---------------------------- MODULO ROLE Y SUS PERMSISO
    {
       DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 1,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 2,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 3,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 4,
        ]);
//
//        DB::table('role_has_permissions')->insert([
//            'role_id' => 1,
//            'permission_id' => 2,
//        ]);
//
//        DB::table('role_has_permissions')->insert([
//            'role_id' => 1,
//            'permission_id' => 3,
//        ]);
//
//        DB::table('role_has_permissions')->insert([
//            'role_id' => 1,
//            'permission_id' => 4,
//        ]);
//
//        DB::table('role_has_permissions')->insert([
//            'role_id' => 1,
//            'permission_id' => 5,
//        ]);
//
//        // ----------------- MODULO DE PERMISOS Y SUS PERMISOS
//
//        DB::table('role_has_permissions')->insert([
//            'role_id' => 1,
//            'permission_id' => 6,
//        ]);
//
//        DB::table('role_has_permissions')->insert([
//            'role_id' => 1,
//            'permission_id' => 7,
//        ]);
//
//        DB::table('role_has_permissions')->insert([
//            'role_id' => 1,
//            'permission_id' => 8,
//        ]);
//
//        DB::table('role_has_permissions')->insert([
//            'role_id' => 1,
//            'permission_id' => 9,
//        ]);
    }
}
