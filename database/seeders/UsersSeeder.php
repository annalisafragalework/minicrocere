<?php
 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                
                'name' => 'Giulia Rossi',
                'email' => 'giulia.rossi@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
              
                'name' => 'Luca Bianchi',
                'email' => 'luca.bianchi@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Annalisa Gragale',
                'email' => 'annalisaf@example.com',
                'password' => Hash::make('password'),
                   'created_at' => now(),
                'updated_at' => now(),
            ],
             
            [
                'name' => 'Mario Rossixxxx',
                'email' => 'mariod@example.com',
                'password' => Hash::make('password'),
                   'created_at' => now(),
                'updated_at' => now(),
            
            ],
            [
                'name' => 'Lucia Bianchissss',
                'email' => 'lucias@example.com',
                'password' => Hash::make('password'),
                    'created_at' => now(),
                'updated_at' => now(),
            
            ],
        ]);
    }
}
