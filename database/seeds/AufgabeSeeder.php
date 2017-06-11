<?php

use Illuminate\Database\Seeder;

class AufgabeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Testaufgabe
        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe1',
            'abgabedatum' => '31.07.2017',
            'aufgabenbeschreibung'=>'Bitte rechnen sie diese 5 Zahlen zusammen',
            'erstellt_von'=>'TestProf',
            'kurs' => 'ALDA'

        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe2',
            'abgabedatum' => '05.02.2017',
            'aufgabenbeschreibung'=>'Bitte addieren sie es zusammen',
            'erstellt_von'=>'TestProf',
            'kurs' =>'ALDA'
        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe3',
            'abgabedatum' => '15.05.2017',
            'aufgabenbeschreibung'=>'Bitte rechnen sie diese 5 Zahlen zusammen',
            'erstellt_von'=>'TestProf',
            'kurs' => 'ALDA'
            ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe4',
            'abgabedatum' => '31.05.2017',
            'aufgabenbeschreibung'=>'Bitte rechnen sie diese 5 Zahlen zusammen',
            'erstellt_von'=>'TestProf',
            'kurs' => 'ALDA'
        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe5',
            'abgabedatum' => '17.06.2017',
            'aufgabenbeschreibung'=>'Bitte bearbeiten sie Aufgabe 1 nochmal',
            'erstellt_von'=>'TestProf',
            'kurs' => 'ALDA'

        ]);
        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe6',
            'abgabedatum' => '17.06.2017',
            'aufgabenbeschreibung'=>'Bitte bearbeiten sie Aufgabe 1 nochmal',
            'erstellt_von'=>'TestProf',
            'kurs' => 'BESY'
        ]);

    }
}
