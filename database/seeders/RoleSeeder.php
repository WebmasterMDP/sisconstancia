<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = Role::create(['name' => 'root']);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $permission = Permission::create(['name' => 'user.index'])->syncRoles([$admin, $root]);

        $permission = Permission::create(['name' => 'conformidad.index'])->syncRoles([$admin, $root, $user]);
        $permission = Permission::create(['name' => 'habilitacion.index'])->syncRoles([$admin, $root, $user]);
        $permission = Permission::create(['name' => 'constancia.index'])->syncRoles([$admin, $root, $user]);
        $permission = Permission::create(['name' => 'parametro.index'])->syncRoles([$admin, $root, $user]);
        $permission = Permission::create(['name' => 'via.pub.index'])->syncRoles([$admin, $root, $user]);

    }
}
