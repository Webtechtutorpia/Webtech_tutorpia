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
            'zugehoerig_zu' => 1
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '-',
            'user' => 1,
            'zugehoerig_zu' => 2
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '-',
            'user' => 1,
            'zugehoerig_zu' => 3
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 1,
            'zugehoerig_zu' => 4
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 1,
            'zugehoerig_zu' => 5
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 2,
            'zugehoerig_zu' => 1
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '-',
            'user' => 2,
            'zugehoerig_zu' => 2
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '-',
            'user' => 2,
            'zugehoerig_zu' => 3
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 2,
            'zugehoerig_zu' => 4
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 2,
            'zugehoerig_zu' => 5
        ]);

    }
}
