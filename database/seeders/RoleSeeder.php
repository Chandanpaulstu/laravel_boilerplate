<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'manage-users', 'guard_name' => 'api']);
        Permission::create(['name' => 'manage-content', 'guard_name' => 'api']);

        // Create roles and assign permissions
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'api']);
        $admin->givePermissionTo(['manage-users', 'manage-content']);

        $user = Role::create(['name' => 'user', 'guard_name' => 'api']);
        $user->givePermissionTo('manage-content');
    }
}
