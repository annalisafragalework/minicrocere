<?php

namespace Modules\MiniCrociere\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiniCrociereMediaSeeder extends Seeder
{
    public function run()
    {
        DB::table('mini_crociere_media')->insert([
            // Immagini della crociera ID 1
            [
                'entita' => 'crociera',
                'entita_id' => 1,
                'path' => 'images/crociere/crociera1.jpg',
                'titolo' => 'Vista sul ponte',
                'descrizione' => 'Tramonto sul ponte principale della crociera',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'entita' => 'crociera',
                'entita_id' => 1,
                'path' => 'images/crociere/crociera1_interno.jpg',
                'titolo' => 'Sala ristorante',
                'descrizione' => 'Interni eleganti della sala ristorante',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Immagini della cabina ID 5
            [
                'entita' => 'cabina',
                'entita_id' => 5,
                'path' => 'images/cabine/cabina5.jpg',
                'titolo' => 'Cabina deluxe',
                'descrizione' => 'Cabina con balcone vista mare',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Immagini dell’escursione ID 3
            [
                'entita' => 'escursione',
                'entita_id' => 3,
                'path' => 'images/escursioni/etna.jpg',
                'titolo' => 'Escursione sull’Etna',
                'descrizione' => 'Vista panoramica dalla cima del vulcano',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
