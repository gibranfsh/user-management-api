<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'get-all-user']);
        Permission::create(['name' => 'get-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);

        Permission::create(['name' => 'get-current-user']);
        Permission::create(['name' => 'logout-user']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'get-all-user',
                'get-user',
                'update-user',
                'delete-user',
                'get-current-user',
                'logout-user',
            ]);

        Role::create(['name' => 'customer'])
            ->givePermissionTo([
                'get-current-user',
                'logout-user',
            ]);

        $this->command->info('Role and permission seeded');
    }
}
