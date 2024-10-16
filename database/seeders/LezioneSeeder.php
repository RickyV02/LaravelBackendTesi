<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LezioneSeeder extends Seeder
{
    public function run()
    {
        $lezioni = [
            [
                'ordine' => 1,
                'data' => '2023-10-02',
                'argomento' => 'Introduzione Corso',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1KtSaHITI6GnDuYwRCe-DF-SoIapIVNci/view?usp=sharing'
                ]),
            ],
            [
                'ordine' => 2,
                'data' => '2023-10-02',
                'argomento' => 'Modello relazionale',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/15EaCh1d7VxnKTfylcErryjHwbERGk1Qo/view?usp=sharing'
                ]),
            ],
            [
                'ordine' => 3,
                'data' => '2023-10-04',
                'argomento' => 'Algebra relazionale',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/15EaCh1d7VxnKTfylcErryjHwbERGk1Qo/view?usp=sharing',
                    'https://drive.google.com/file/d/1xhLANQBfE-IPZenv5l__r-LpDB_vGVbi/view?usp=sharing'
                ]),
            ],
            [
                'ordine' => 4,
                'data' => '2023-10-09',
                'argomento' => 'Esercitazione Algebra relazionale',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1jGRLpZON_ydNYmKO80tpAFVwFnf0xMPU/view?usp=drive_link'
                ]),
            ],
            [
                'ordine' => 5,
                'data' => '2023-10-11',
                'argomento' => 'SQL: Concetti di base',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1fG6gzViO1lCwVUnOTlMy4aAFP1ebPNXA/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 6,
                'data' => '2023-10-16',
                'argomento' => 'Esercitazione MySQL',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1Pqm2TqSfBQXboEPyh3y2eGgEH5mt-PA7/view?usp=share_link',
                    'https://drive.google.com/file/d/1i7J1amDr4M01sJzI3dO-i5pdI1dERq1H/view?usp=share_link'
                ])
            ],
            [
                'ordine' => 7,
                'data' => '2023-10-18',
                'argomento' => 'SQL: Operatori aggregati',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1A4mCEehIwVzy1upPbaMFVsH7opPb6-3o/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 8,
                'data' => '2023-10-23',
                'argomento' => 'Esercitazione operatori aggregati',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1G4ahE5VfEiN24muC71vMFQ-5_-l-DOiC/view?usp=sharing',
                    'https://drive.google.com/file/d/1spNlz6uf3L99u0WcApaVwyBlIPntX-hm/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 9,
                'data' => '2023-10-25',
                'argomento' => 'SQL Avanzato: Viste, Trigger e Procedure',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1ozn-jZ9T1RyDab2dNy-xAMl50L3Jh-_p/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 10,
                'data' => '2023-10-30',
                'argomento' => 'Esercitazione Trigger e Procedure',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1ObvX1ge8y0DprSpLNIfv-BbeP2Fhrj-v/view?usp=sharing',
                    'https://drive.google.com/file/d/196iZq1glejybu-TEcTCswHY-MSgDI8o-/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 11,
                'data' => '2023-11-06',
                'argomento' => 'Esercitazione Complessiva SQL - 1',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1Vojmmpwx2-9t_jbwWkKjqjVJo5rr1Fnf/view?usp=sharing',
                    'https://drive.google.com/file/d/1h2KtBlItR-cOHQgV1PC1R31B9pLWum_K/view?usp=sharing',
                    'https://drive.google.com/file/d/1ItkEegrrIM5Gz49Ez-mcWSxHH8kfjS9I/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 12,
                'data' => '2023-11-08',
                'argomento' => 'Esercitazione Complessiva SQL - 2',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1WPOVOcOZfmL2bCSfOmE3OY0plZihMW4a/view?usp=sharing',
                    'https://drive.google.com/file/d/1kL5wH4UwKUIlBE-qP2eeDdKiYSfla0zg/view?usp=sharing',
                    'https://drive.google.com/file/d/1mWzBK8Ze0ExTDEkNfzd3d7Q6j5zTwVI9/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 13,
                'data' => '2023-11-13',
                'argomento' => 'Simulazione Prova SQL',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1WwoIEp-ZXCdvkpyH_bOdL_NcqbSlScj3/view?usp=sharing',
                    'https://drive.google.com/file/d/1RQFwUKqQqOzh9r09nkANdop1etKegJSS/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 14,
                'data' => '2023-11-15',
                'argomento' => 'Progettazione Concettuale',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1T2qWYqu8RRHym9q3uZ5yKG5jCa4KesMx/view?usp=sharing',
                    'https://drive.google.com/file/d/1bumTEK2c8FPxLR13vt1b4YN0CYs2eGqG/view?usp=sharing',
                    'https://drive.google.com/file/d/1Zqa9cG7AU2IWQW-qrpkerJSD9imdf0Y9/view?usp=sharing'
                ]),
            ],
            [
                'ordine' => 15,
                'data' => '2023-11-20',
                'argomento' => 'Progettazione logica',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1EpZHqbGwYR_F4ZkJp-eD7WveW_3aOoeU/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 16,
                'data' => '2023-11-27',
                'argomento' => 'Esercitazione progettazione logica',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1QK_tr2etbt9YKdcQF2X5bS9tYZeZ_Siu/view?usp=sharing',
                    'https://drive.google.com/file/d/1xj8WvXiotBFhdqg26Pvjh9_fVahr4kpQ/view?usp=sharing',
                    'https://drive.google.com/file/d/1rDVTvbkonUkjhh9WkvoY89yV-5_7dY9e/view?usp=sharing',
                    'https://drive.google.com/file/d/1gc-QkVkam_TYhIPCcYJZRGNXi7AO9X64/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 17,
                'data' => '2023-11-29',
                'argomento' => 'Simulazione prova di progettazione',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1iI1n25r_GHPQzqKUQZtNYZrnV0JdoB15/view?usp=sharing',
                    'https://drive.google.com/file/d/1K2atC5VFIMhi1tcf00qUGrVIDGg01ota/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 18,
                'data' => '2023-12-01',
                'argomento' => 'Esercitazione progettazione logica',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1FxgOPBFh3eEDcDCXQEH9osvpgX-Ur4yd/view?usp=sharing',
                    'https://drive.google.com/file/d/1ZusA9Ez7uIxkHEeSF-W_6OApwEnNth1c/view?usp=sharing'
                ])
            ],
            [
                'ordine' => 19,
                'data' => '2023-12-06',
                'argomento' => 'Esercitazione finale SQL',
                'corso_id' => 1,
                'link' => json_encode([
                    'https://drive.google.com/file/d/1lpLrrkaoQsGvxYY3WqWPZBjMwrovMOhX/view?usp=sharing',
                    'https://drive.google.com/file/d/1dC_TwLnKpnBetiTC6StZD031chHjwUH1/view?usp=sharing',
                    'https://drive.google.com/file/d/1mXuyo69WavNkJN2LiIrwZ3RuzKrXX-zY/view?usp=sharing'
                ])
            ],
        ];

        foreach ($lezioni as $lezione) {
            DB::table('lezione')->insert($lezione);
        }
    }
}
