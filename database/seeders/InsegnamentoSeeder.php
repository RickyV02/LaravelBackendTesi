<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsegnamentoSeeder extends Seeder
{
    public function run()
    {
        $spampinato = DB::table('professore')->where('email', 'concetto.spampinato@gmail.com')->first();
        $proietto = DB::table('professore')->where('email', 'federica.proietto@gmail.com')->first();

        $corsi = DB::table('corso')->get();

        foreach ($corsi as $corso) {
            DB::table('insegnamento')->insert([
                [
                    'professore_id' => $spampinato->id,
                    'corso_id' => $corso->id
                ],
                [
                    'professore_id' => $proietto->id,
                    'corso_id' => $corso->id
                ]
            ]);
        }
    }
}