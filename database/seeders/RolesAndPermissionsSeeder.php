<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'add building']);
        Permission::create(['name' => 'edit building']);
        Permission::create(['name' => 'delete building']);

        $agent = Role::create(['name' => 'agent'])->givePermissionTo(['add building', 'edit building', 'delete building']);
        $admin = Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
    }
}
