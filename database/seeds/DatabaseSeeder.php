<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EspecialidadesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UserHasRolesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(EspecialidadesUsersTableSeeder::class);
        $this->call(MedicinasTableSeeder::class);


    }
}
