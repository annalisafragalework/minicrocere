<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Ruoli
    $roles = ['superadministrator', 'proprietario', 'personale', 'cliente'];
    foreach ($roles as $role) {
        Role::firstOrCreate(['name' => $role]);
    }

    // Permessi
    $permissions = [
        'access mini-cruises',
        'manage boats',
        'assign staff',
        'book cruise',
    ];
    foreach ($permissions as $permission) {
        Permission::firstOrCreate(['name' => $permission]);
    }

    // Assegna tutti i permessi al superadministrator
    $adminRole = Role::findByName('superadministrator');
    $adminRole->givePermissionTo(Permission::all());

    // Crea utente superadmin
    $admin = User::firstOrCreate(['email' => 'admin@example.com'], [
        'name' => 'Super Admin',
        'password' => bcrypt('password'),
    ]);
    $admin->assignRole('superadministrator');
    }
}
