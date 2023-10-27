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
            'name'      =>'root',
            'username'  =>'root',
            'numdoc' =>'00000000',
            'rol'       =>'root',
            'estado'    =>'1',
            'email'     =>'root@root.com',
            'password'  =>bcrypt('muniM@ster2023$')
        ])->assignRole('root');

        /* User::create([
            'name'      =>'root',
            'username'  =>'root',
            'numdoc' =>'00000000',
            'rol'       =>'root',
            'estado'    =>'1',
            'email'     =>'root@root.com',
            'password'  =>bcrypt('00000000')
        ])->assignRole('root'); */

        User::create([
            'name'      =>'GIANFRONCO SALVATIERRA CUBA',
            'username'  =>'gsalvatierra',
            'numdoc' =>'09716894',
            'rol'       =>'admin',
            'estado'    =>'1',
            'email'     =>'gsalvatierrac@munipachacamac.gob.pe',
            'password'  =>bcrypt('09716894')
        ])->assignRole('admin');

        /* User::create([
            'name'      =>'USUARIO',
            'username'  =>'user',
            'numdoc' =>'87654321',
            'rol'       =>'user',
            'estado'    =>'1',
            'email'     =>'user@gmail.com',
            'password'  =>bcrypt('87654321')
        ])->assignRole('user'); */

    }
}
