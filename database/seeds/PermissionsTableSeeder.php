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
           'name'=> 'ModuloUsuarios',
           'created_at' => \Carbon\Carbon::now(),
           'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name'=> 'AgregarUsuarios',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('permissions')->insert([
            'name'=> 'PermisosUsuarios',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EditarUsuarios',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EliminarUsuarios',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloRoles',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'NuevoRole',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'PermisoRole',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EditarRole',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EliminarRole',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloPermisos',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EditarPermiso',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EliminarPermiso',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloMedicina',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EditarMedicina',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EliminarMedicina',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloEspecialidades',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EditarEspecialidades',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EliminarEspecialidades',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloPaciente',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'Ver Citas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'CrearCitas',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloSecretaria',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'CitasSecretaria',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EditarCita',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EliminarCita',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloCitasdeMedico',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'VerCitasDeMedico',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'EspecialidadMedico',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloMedico',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'HistoriaLocal',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'CrearHistoria',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'CrearRecipe',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'RecipeLocal',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'AsignarMedicina',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'HistorialGlobal',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'RecipeGlobal',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloPacientes',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'PacientesHistoria',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'PacientesRecipes',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'ModuloFarmaceuta',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'DespachoMedicina',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name'=> 'HistorialDespacho',
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
