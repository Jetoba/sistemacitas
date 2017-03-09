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
            'fechanacimiento'=> '1993-06-11',
            'email'=> 'administrador@gmail.com',
            'password'=>bcrypt('123456'),
            'especialidad_id'=>'4',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Adan',
            'apellido' => 'Escussa',
            'cedula' => '6400809',
            'telefono' => '02122516015',
            'celular'=> '04241848543',
            'fechanacimiento'=> '1963-10-30',
            'email'=> 'secretaria@gmail.com',
            'password'=>bcrypt('123456'),
            'especialidad_id'=>'4',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Morela',
            'apellido' => 'Baeta',
            'cedula' => '6204013',
            'telefono' => '02122512175',
            'celular'=> '04123239836',
            'fechanacimiento'=> '1964-08-11',
            'email'=> 'farmaceuta@gmail.com',
            'password'=>bcrypt('123456'),
            'especialidad_id'=>'4',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Maria',
            'apellido' => 'Gabriela',
            'cedula' => '18526352',
            'telefono' => '02123239835',
            'celular'=> '04123239835',
            'fechanacimiento'=> '1989-03-9',
            'email'=> 'drgaby@gmail.com',
            'password'=>bcrypt('123456'),
            'especialidad_id'=>'1',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Pendiente',
            'apellido' => 'Pendiente',
            'cedula' => '01',
            'telefono' => '02120000000',
            'celular'=> '04120000000',
            'fechanacimiento'=> '1999-03-9',
            'email'=> 'pendiente@gmail.com',
            'password'=>bcrypt('123456'),
            'especialidad_id'=>'4',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);




    }
}
