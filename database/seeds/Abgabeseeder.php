<?php

use Illuminate\Database\Seeder;

class Abgabeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 1,
            'zugehoerig_zu' => 1,
            'kommentar'=>'super',
            'bearbeitet_von'=>'TestTutor'
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '-',
            'user' => 1,
            'zugehoerig_zu' => 2,
            'kommentar'=>'leider zu viele Fehler',
            'bearbeitet_von'=>'TestTutor'
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '/',
            'user' => 1,
            'zugehoerig_zu' => 3,
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '.',
            'user' => 1,
            'zugehoerig_zu' => 4
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 1,
            'zugehoerig_zu' => 5,
            'kommentar'=>'super gemacht',
            'bearbeitet_von'=>'TestTutor'
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 2,
            'zugehoerig_zu' => 1,
            'kommentar'=>'perfekt',
            'bearbeitet_von'=>'TestTutor'
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '-',
            'user' => 2,
            'zugehoerig_zu' => 2,
            'kommentar'=>'zu ungenau',
            'bearbeitet_von'=>'TestTutor'
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '-',
            'user' => 2,
            'zugehoerig_zu' => 3,
            'kommentar'=>'zu wenig',
            'bearbeitet_von'=>'TestTutor'
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 2,
            'zugehoerig_zu' => 4,
            'kommentar'=>'super',
            'bearbeitet_von'=>'TestTutor'
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 2,
            'zugehoerig_zu' => 5,
            'kommentar'=>'passt alles',
            'bearbeitet_von'=>'TestTutor'
        ]);
        DB::table('abgabe')->insert([
            'zustand' => '-',
            'user' => 2,
            'zugehoerig_zu' => 6,
            'kommentar'=>'nochmal machen',
            'bearbeitet_von'=>'TestTutor'
        ]);

    }
}
