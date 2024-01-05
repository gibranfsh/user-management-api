<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin01 = User::create([
            'name' => 'Admin 01',
            'email' => 'admin01@email.com',
            'password' => bcrypt('admin01'),
        ]);

        $admin02 = User::create([
            'name' => 'Admin 02',
            'email' => 'admin02@email.com',
            'password' => bcrypt('admin02'),
        ]);

        $customer01 = User::create([
            'name' => 'Customer 01',
            'email' => 'customer01@email.com',
            'password' => bcrypt('customer01'),
        ]);

        $customer02 = User::create([
            'name' => 'Customer 02',
            'email' => 'customer02@email.com',
            'password' => bcrypt('customer02'),
        ]);

        $admin01->assignRole('admin');
        $admin02->assignRole('admin');

        $customer01->assignRole('customer');
        $customer02->assignRole('customer');

        $this->command->info('User seeded');
    }
}
