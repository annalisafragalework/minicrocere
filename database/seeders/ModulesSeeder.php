<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 use App\Models\Module;
class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    Module::firstOrCreate(['name' => 'minicrociere']);
    Module::firstOrCreate(['name' => 'hotel']);
}

}
