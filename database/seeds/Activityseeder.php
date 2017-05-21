<?php

use Illuminate\Database\Seeder;

class Activityseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity')->insert([
            'abgabedatum' => '31.07.2017',
            'aufgabenname' => 'Aufgabe1',
            'bearbeitet_von'=>'TestProf',
         'zuordnung_aufgabe'=>1,
        'zuordnung_abgabe'=>2

        ]);

        DB::table('activity')->insert([
            'abgabedatum' => '05.02.2017',
            'aufgabenname' => 'Aufgabe2',
            'bearbeitet_von'=>'TestTutor',
            'zuordnung_aufgabe'=>2,
            'zuordnung_abgabe'=>3

        ]);
    }
}
