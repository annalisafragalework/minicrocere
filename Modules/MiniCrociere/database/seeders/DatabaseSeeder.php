<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            MiniCrociereSeeder::class,
            MiniCrociereItinerariSeeder::class,
            MiniCrociereCabineSeeder::class,
            MiniCrociereRuoliSeeder::class,
            MiniCrociereUtentiRuoliSeeder::class,
            MiniCrocierePrenotazioniSeeder::class,
        ]);
    }
}
