<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfessoreSeeder extends Seeder
{
    public function run()
    {
        DB::table('professore')->insert([
            [
                'nome' => 'Concetto',
                'cognome' => 'Spampinato',
                'email' => 'concetto.spampinato@gmail.com', 
                'password' => Hash::make('Concetto'), 
            ],
            [
                'nome' => 'Federica',
                'cognome' => 'Proietto Salanitri',
                'email' => 'federica.proietto@gmail.com', 
                'password' => Hash::make('Federica'), 
            ],
        ]);
    }
}