<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'aufgabenbeschreibung'=>'Bitte addieren sie die Zahl 3 und 5 ',
            'erstellt_von'=>'TestProf',
            'kurs' => 'ALDA',
            'created_at'=>Carbon::now()

        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe2',
            'abgabedatum' => '05.02.2017',
            'aufgabenbeschreibung'=>'Bitte dividieren sie 9 durch 3',
            'erstellt_von'=>'TestProf',
            'kurs' =>'ALDA',
            'created_at'=>Carbon::now()
        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe3',
            'abgabedatum' => '15.05.2017',
            'aufgabenbeschreibung'=>' Geben Sie die Quersumme von 123832 an',
            'erstellt_von'=>'TestProf',
            'kurs' => 'ALDA',
            'created_at'=>Carbon::now()
            ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe4',
            'abgabedatum' => '31.06.2017',
            'aufgabenbeschreibung'=>' 5 * 8-5 was gibt das?',
            'erstellt_von'=>'TestProf',
            'kurs' => 'ALDA',
            'created_at'=>Carbon::now()
        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe5',
            'abgabedatum' => '17.06.2017',
            'aufgabenbeschreibung'=>'123213 % 2 welcher Rest bleibt übrig?',
            'erstellt_von'=>'TestProf',
            'kurs' => 'ALDA',
            'created_at'=>Carbon::now()

        ]);
        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe6',
            'abgabedatum' => '17.06.2017',
            'aufgabenbeschreibung'=>'Olaf kauft sich 5 Äpfel und tauscht 2 gegen eine Birne. Er isst einen Apfel. Wieviel Obst besitzt er noch?',
            'erstellt_von'=>'TestProf',
            'kurs' => 'BESY',
            'created_at'=>Carbon::now()
        ]);

    }
}
