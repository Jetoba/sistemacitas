<?php

use Illuminate\Database\Seeder;

class MedicinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicinas')->insert([

            'nombre'=>'Loratadina',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('medicinas')->insert([

            'nombre'=>'Atamel',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('medicinas')->insert([

            'nombre'=>'Migrate',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('medicinas')->insert([

            'nombre'=>'Dencorum',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('medicinas')->insert([

            'nombre'=>'Acetaminofen',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('medicinas')->insert([

            'nombre'=>'Sertralina',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
        DB::table('medicinas')->insert([

            'nombre'=>'Alivet',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now(),

        ]);
    }
}
