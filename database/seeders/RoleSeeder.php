<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionData = [
            'name' => 'access management',
            'guard_name' => 'web',
        ];

        $permissionsTable = config('permission.table_names.permissions', 'permissions');

        if (Schema::hasTable($permissionsTable) && Schema::hasColumn($permissionsTable, 'group_name')) {
            $permissionData['group_name'] = 'Access Management';
        }

        $permission = Permission::firstOrCreate([
            'name' => 'access management',
            'guard_name' => 'web',
        ], $permissionData);

        $role = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        $role->givePermissionTo($permission);

        $admin = \App\Models\User::firstWhere('email', 'admin@gmail.com');

        if ($admin) {
            $admin->assignRole($role);
        }
    }
}
