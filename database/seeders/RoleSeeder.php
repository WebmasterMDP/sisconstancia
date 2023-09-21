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
        $superadmin = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
/*         $stadmin = Role::create(['name' => 'stadmin']);
        $stuser = Role::create(['name' => 'stuser']); */

        $permission = Permission::create(['name' => 'home.password'])->syncRoles([$stadmin, $stuser]);
        
    }
}
