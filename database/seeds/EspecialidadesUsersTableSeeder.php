<?php

use Illuminate\Database\Seeder;

class EspecialidadesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidades_users')->insert([
            'usuario_id'=>1,
            'especialidad_id'=>4,
        ]);

        DB::table('especialidades_users')->insert([
            'usuario_id'=>2,
            'especialidad_id'=>4,
        ]);
        DB::table('especialidades_users')->insert([
            'usuario_id'=>3,
            'especialidad_id'=>4,
        ]);
        DB::table('especialidades_users')->insert([
            'usuario_id'=>4,
            'especialidad_id'=>2,
        ]);

        DB::table('especialidades_users')->insert([
            'usuario_id'=>5,
            'especialidad_id'=>4,
        ]);

        DB::table('especialidades_users')->insert([
            'usuario_id'=>6,
            'especialidad_id'=>1,
        ]);
        DB::table('especialidades_users')->insert([
            'usuario_id'=>7,
            'especialidad_id'=>3,
        ]);
        DB::table('especialidades_users')->insert([
            'usuario_id'=>8,
            'especialidad_id'=>5,
        ]);
        DB::table('especialidades_users')->insert([
            'usuario_id'=>9,
            'especialidad_id'=>6,
        ]);
        DB::table('especialidades_users')->insert([
            'usuario_id'=>10,
            'especialidad_id'=>7,
        ]);

    }
}
