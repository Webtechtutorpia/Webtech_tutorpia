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
            'zeit'=>'2017-05-15 14:06:00',
         'zuordnung_aufgabe'=>1,
        'zuordnung_abgabe'=>1,
            'was'=>'abgabe',
            'user'=>'1'

        ]);

        DB::table('activity')->insert([

            'zeit'=>'2017-04-15 16:22:28',
            'zuordnung_aufgabe'=>2,
            'zuordnung_abgabe'=>2,
            'was'=>'abgabe',
            'user'=>'1'

        ]);
        DB::table('activity')->insert([
            'zeit'=>'2017-05-10 14:06:00',
            'zuordnung_aufgabe'=>1,
            'zuordnung_abgabe'=>1,
            'was'=>'aufgabe',
            'user'=>'1'

        ]);
        DB::table('activity')->insert([

            'zeit'=>'2017-04-01 16:22:28',
            'zuordnung_aufgabe'=>2,
            'zuordnung_abgabe'=>2,
            'was'=>'aufgabe',
            'user'=>'1'

        ]);
    }
}
