<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
           'name'=> 'CitasSecretaria',
           'created_at' => \Carbon\Carbon::now(),
           'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name'=> 'IndexPaciente',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name'=> 'IndexFarmaceuta',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'IndexMedico',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
//
//        DB::table('permissions')->insert([
//            'name'=> 'CrearRole',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=> 'EditarRole',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=> 'EliminarRole',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
//
//        //----------------PERMISOS ---------------------
//
//        DB::table('permissions')->insert([
//            'name'=> 'ModuloPermisos',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
//
//
//        DB::table('permissions')->insert([
//            'name'=> 'CrearPermiso',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=> 'EditarPermiso',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
//
//        DB::table('permissions')->insert([
//            'name'=> 'EliminarPermiso',
//            'created_at' => \Carbon\Carbon::now(),
//            'updated_at' => \Carbon\Carbon::now(),
//        ]);
    }
}
