<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CorsoSeeder;
use Database\Seeders\ProfessoreSeeder;
use Database\Seeders\InsegnamentoSeeder;
use Database\Seeders\LezioneSeeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CorsoSeeder::class,
            ProfessoreSeeder::class,
            InsegnamentoSeeder::class,
            LezioneSeeder::class
        ]);
    }
}