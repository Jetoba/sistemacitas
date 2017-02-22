<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'Jesus',
            'apellido' => 'Toro',
            'cedula' => '21415751',
            'telefono' => '02122512175',
            'celular'=> '04123239834',
            'email'=> 'jesustoroujmv@gmail.com',
            'password'=>bcrypt('123456'),
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
