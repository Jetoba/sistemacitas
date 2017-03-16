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
            'edad'=>'25',
            'sexo'=>'Masculino',
            'email'=> 'administrador@gmail.com',
            'direccion'=> 'Caracas Palo verde',
            'password'=>bcrypt('123456'),
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
            'edad'=>'25',
            'sexo'=>'Masculino',
            'email'=> 'secretaria@gmail.com',
            'password'=>bcrypt('123456'),
            'direccion'=> 'Caracas Palo verde',
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
            'edad'=>'25',
            'sexo'=>'Femenino',
            'email'=> 'farmaceuta@gmail.com',
            'direccion'=> 'Caracas Palo verde',
            'password'=>bcrypt('123456'),
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
            'edad'=>'25',
            'sexo'=>'Femenino',
            'email'=> 'doctorgaby@gmail.com',
            'direccion'=> 'Caracas Palo verde',
            'password'=>bcrypt('123456'),
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Pendiente',
            'apellido' => 'Pendiente',
            'cedula' => '01',
            'telefono' => '01',
            'celular'=> '01',
            'fechanacimiento'=> '1963-10-30',
            'edad'=>'01',
            'sexo'=>'Masculino',
            'email'=> '01@gmail.com',
            'password'=>bcrypt('123456'),
            'direccion'=> 'tierra de nadie',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Victoria',
            'apellido' => 'Figuera',
            'cedula' => '24514521',
            'telefono' => '02125326958',
            'celular'=> '02125773158',
            'fechanacimiento'=> '1989-03-5',
            'edad'=>'28',
            'sexo'=>'Femenino',
            'email'=> 'doctorvicky@gmail.com',
            'direccion'=> 'Caracas Palo verde',
            'password'=>bcrypt('123456'),
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);




    }
}
