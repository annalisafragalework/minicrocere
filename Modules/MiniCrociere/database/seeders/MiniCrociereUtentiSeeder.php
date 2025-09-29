<?php

namespace Modules\MiniCrociere\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniCrociereUtentiSeeder extends Seeder
{
    public function run()
    {
        DB::table('mini_crociere_utenti')->insert([
            [
                'nome' => 'Giulia',
                'cognome' => 'Rossi',
                'email' => 'giulia.rossi@example.com',
                'telefono' => '3331234567',
                'data_nascita' => '1990-05-12',
                'documento_identita' => 'XR123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Luca',
                'cognome' => 'Bianchi',
                'email' => 'luca.bianchi@example.com',
                'telefono' => '3399876543',
                'data_nascita' => '1985-11-03',
                'documento_identita' => 'YT987654',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
