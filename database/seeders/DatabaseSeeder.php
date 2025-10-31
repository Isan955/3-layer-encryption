<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'view posts',
            'create posts',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web', // ← Tambahkan ini
            ]);
        }

        // Create roles and assign permissions
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web', // ← Tambahkan ini
        ]);
        $adminRole->givePermissionTo(['view posts', 'create posts']);

        $userRole = Role::create([
            'name' => 'user',
            'guard_name' => 'web', // ← Tambahkan ini
        ]);
        $userRole->givePermissionTo('view posts');

        // Create users and assign roles
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        $adminUser->assignRole('admin');

        $regularUser1 = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
        ]);
        $regularUser1->assignRole('user');

        $regularUser2 = User::create([
            'name' => 'ardhi',
            'email' => 'ardhi@gmail.com',
            'password' => Hash::make('user123'),
        ]);
        $regularUser2->assignRole('user');

        // Call other seeders
        $this->call(ServiceSeeder::class);
        $this->call(ServicePriceSeeder::class);
    }
}
