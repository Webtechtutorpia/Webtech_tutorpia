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
        'geleitet_von' =>4
    ]);
        DB::table('kurs')->insert([
            'bezeichnung'=>'BESY',
            'geleitet_von' =>4
        ]);
        DB::table('kurs')->insert([
            'bezeichnung'=>'WebTech',
            'geleitet_von' =>4
        ]);

    }
}
