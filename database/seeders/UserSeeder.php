<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      =>'ADMIN',
            'username'  =>'admin',
            'numdoc' =>'00000000',
            'rol'       =>'superadmin',
            'estado'    =>'1',
            'email'     =>'admin@admin.com',
            'password'  =>bcrypt('admin123')
        ])->assignRole('superadmin');

        User::create([
            'name'      =>'PRUEBA',
            'username'  =>'admin',
            'numdoc' =>'12345678',
            'rol'       =>'stuser',
            'estado'    =>'1',
            'email'     =>'1@MDP.com',
            'password'  =>bcrypt('12345678')
        ])->assignRole('stuser');
    }
}
