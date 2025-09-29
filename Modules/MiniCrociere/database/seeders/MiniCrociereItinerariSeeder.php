<?php

namespace Modules\MiniCrociere\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniCrociereItinerariSeeder extends Seeder
{
    public function run()
    {
        DB::table('mini_crociere_itinerari')->insert([
            [
                'mini_crociera_id' => 1,
                'giorno' => 1,
                'localita' => 'Lipari',
                'attivita_previste' => 'Visita al centro storico e spiaggia Bianca',
                'orario_arrivo' => '09:00:00',
                'orario_partenza' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mini_crociera_id' => 1,
                'giorno' => 2,
                'localita' => 'Vulcano',
                'attivita_previste' => 'Bagno nei fanghi termali e trekking al cratere',
                'orario_arrivo' => '08:30:00',
                'orario_partenza' => '17:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
