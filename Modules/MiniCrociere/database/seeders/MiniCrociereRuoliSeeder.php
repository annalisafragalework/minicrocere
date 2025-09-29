<?php

namespace Modules\MiniCrociere\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniCrociereRuoliSeeder extends Seeder
{
    public function run()
    {
        DB::table('mini_crociere_ruoli')->insert([
            [
                'nome' => 'cliente',
                'descrizione' => 'Utente che prenota e partecipa alle mini crociere',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'staff',
                'descrizione' => 'Personale di bordo e gestione crociera',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'admin',
                'descrizione' => 'Amministratore del modulo MiniCrociere',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
