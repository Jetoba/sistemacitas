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

        // ---------------------------- ADMINISTRADO PERMISOS
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
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 5,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 6,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 7,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 8,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 9,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 10,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 11,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 12,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 13,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 14,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 15,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 16,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 17,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 18,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 1,
            'permission_id' => 19,
        ]);
        // ---------------------------- ADMINISTRADO PERMISOS
        // ---------------------------- PACIENTE PERMISOS
        DB::table('role_has_permissions')->insert([
            'role_id' => 5,
            'permission_id' => 20,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 5,
            'permission_id' => 21,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 5,
            'permission_id' => 22,
        ]);
        // ---------------------------- PACIENTE PERMISOS
        // ---------------------------- SECRETARIA PERMISOS

        DB::table('role_has_permissions')->insert([
            'role_id' => 4,
            'permission_id' => 23,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 4,
            'permission_id' => 24,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 4,
            'permission_id' => 25,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 4,
            'permission_id' => 26,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 4,
            'permission_id' => 27,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 4,
            'permission_id' => 28,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 4,
            'permission_id' => 29,
        ]);
        // ---------------------------- SECRETARIA PERMISOS
        // ---------------------------- MEDICO PERMISOS
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 30,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 31,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 32,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 33,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 34,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 35,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 36,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 37,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 38,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 39,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 2,
            'permission_id' => 40,
        ]);
        // ---------------------------- MEDICO PERMISOS
        // ---------------------------- FARMACEUTA PERMISOS
        DB::table('role_has_permissions')->insert([
            'role_id' => 3,
            'permission_id' => 41,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 3,
            'permission_id' => 42,
        ]);
        DB::table('role_has_permissions')->insert([
            'role_id' => 3,
            'permission_id' => 43,
        ]);
        // ---------------------------- FARMACEUTA PERMISOS









    }
}
