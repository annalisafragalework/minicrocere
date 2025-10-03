<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $role = Role::firstOrCreate([
            'name' => 'administrator',
            'guard_name' => 'web'
        ]);

        $user = User::firstOrCreate([
            'email' => 'admin@pamella.it'
        ], [
            'name' => 'Annalisa Admin',
            'password' => bcrypt('password123')
        ]);

        if (!$user->hasRole('administrator')) {
            $user->assignRole($role);
        }
    }
}
