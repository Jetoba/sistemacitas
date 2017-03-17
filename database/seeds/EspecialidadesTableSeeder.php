<?php

use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('especialidades')->insert([
// Victoria Figuera
            'nombre'=>'Pediatra',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('especialidades')->insert([
//Maria Baeta
            'nombre'=>'Cardiologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);

        DB::table('especialidades')->insert([
//Juan Barreto
            'nombre'=>'Odontologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);

        DB::table('especialidades')->insert([

            'nombre'=>'n/t',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);

        DB::table('especialidades')->insert([
//Luis quepi
            'nombre'=>'Cirugia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('especialidades')->insert([
//Fernando Carapeillo
            'nombre'=>'Ginecologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('especialidades')->insert([
//luis figueroa
            'nombre'=>'Oftalmologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('especialidades')->insert([

            'nombre'=>'Dermatologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
    }
}
