<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@mail.com',
            'password'  => bcrypt('password'),
            'role'      => 'admin',
            'status'    => 'active',
        ]);

        User::create([
            'name'      => 'user',
            'email'     => 'user@mail.com',
            'password'  => bcrypt('password'),
            'role'      => 'user',
            'status'    => 'active',
        ]);
    }
}
