<?php

use Illuminate\Database\Seeder;

class Kursseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kurs')->insert([
        'bezeichnung'=>'ALDA',
        'rolle'=>'Tutor',
        'geleitet_von' =>4
    ]);
        DB::table('kurs')->insert([
            'bezeichnung'=>'BESY',
            'rolle'=>'Professor',
            'geleitet_von' =>4
        ]);

    }
}
