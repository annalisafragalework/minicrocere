<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::firstOrCreate(['name' => 'administrator', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'dottore', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'paziente', 'guard_name' => 'web']);
    }
}
