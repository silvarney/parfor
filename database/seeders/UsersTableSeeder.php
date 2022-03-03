<?php

namespace Database\Seeders;
use App\Models\User;

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
        User::create([
            'name'      => 'Administrador',
            'email'     => 'admin@parfor.com',
            'password'  => \Hash::make('123456'),
            'type'      => 'Admin'
        ]);
    }
}
