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

            'nombre'=>'Pediatra',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('especialidades')->insert([

            'nombre'=>'Cardiologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);

        DB::table('especialidades')->insert([

            'nombre'=>'Odontologia',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);

        DB::table('especialidades')->insert([

            'nombre'=>'n/t',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
    }
}
