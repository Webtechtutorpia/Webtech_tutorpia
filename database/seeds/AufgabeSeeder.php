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
            'abgabedatum' => 'Heute',
            'aufgabenbeschreibung' => 'Das ist eine Aufgabe',
            'erstellt_von'=> 1
        ]);

    }
}
