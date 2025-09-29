<?php

namespace Modules\MiniCrociere\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniCrociereUtentiRuoliSeeder extends Seeder
{
    public function run()
    {
        DB::table('mini_crociere_utenti_ruoli')->insert([
    [
        'user_id' => 2, // Giulia Rossi
        'ruolo_id' => 1, // cliente
        'mini_crociera_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'user_id' => 3, // Luca Bianchi
        'ruolo_id' => 2, // staff
        'mini_crociera_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);
    }
}
