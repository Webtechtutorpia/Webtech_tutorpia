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
            'kurs' => 1

        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe2',
            'abgabedatum' => 'Heute',
            'kurs' => 1
        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe3',
            'abgabedatum' => 'Heute',
            'kurs' => 1
        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe4',
            'abgabedatum' => 'Heute',
            'kurs' => 1
        ]);

        DB::table('aufgabe')->insert([
            'aufgabenname' => 'Aufgabe5',
            'abgabedatum' => 'Heute',
            'kurs' => 1
        ]);

    }
}
