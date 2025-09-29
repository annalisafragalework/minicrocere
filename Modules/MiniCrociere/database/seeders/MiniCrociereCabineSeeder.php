<?php

namespace Modules\MiniCrociere\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniCrociereCabineSeeder extends Seeder
{
    public function run()
    {
        DB::table('mini_crociere_cabine')->insert([
            [
                'mini_crociera_id' => 1,
                'numero_cabina' => '101',
                'tipo' => 'singola',
                'prezzo' => 100.00,
                'disponibile' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mini_crociera_id' => 1,
                'numero_cabina' => '102',
                'tipo' => 'doppia',
                'prezzo' => 180.00,
                'disponibile' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
