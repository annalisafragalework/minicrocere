<?php

namespace Modules\MiniCrociere\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniCrocierePrenotazioniSeeder extends Seeder
{
    public function run()
    {
        DB::table('mini_crociere_prenotazioni')->insert([
            [
                'user_id' => 2,
                'mini_crociera_id' => 1,
                'cabina_id' => 2,
                'numero_persone' => 2,
                'data_prenotazione' => now()->subDays(5),
                'stato' => 'confermata',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'mini_crociera_id' => 2,
                'cabina_id' => 1,
                'numero_persone' => 1,
                'data_prenotazione' => now()->subDays(2),
                'stato' => 'in_attesa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
