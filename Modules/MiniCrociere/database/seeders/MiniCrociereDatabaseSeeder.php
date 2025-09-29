<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniCrociereSeeder extends Seeder
{
    public function run()
    {
        DB::table('mini_crociere')->insert([
            [
                'nome' => 'Crociere delle Isole Eolie',
                'descrizione' => 'Tour tra Lipari, Vulcano e Stromboli',
                'data_partenza' => '2025-07-10',
                'data_ritorno' => '2025-07-15',
                'porto_partenza' => 'Milazzo',
                'porto_arrivo' => 'Milazzo',
                'prezzo_base' => 450.00,
                'stato' => 'attiva',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Weekend in Costiera Amalfitana',
                'descrizione' => 'Mini tour tra Amalfi, Positano e Capri',
                'data_partenza' => '2025-08-01',
                'data_ritorno' => '2025-08-03',
                'porto_partenza' => 'Napoli',
                'porto_arrivo' => 'Napoli',
                'prezzo_base' => 320.00,
                'stato' => 'attiva',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

