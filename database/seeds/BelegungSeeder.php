<?php

use Illuminate\Database\Seeder;

class BelegungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('belegung')->insert([
            'user'=>4,
            'kurs' =>'BESY',
            'rolle'=>'Professor'
        ]);
        DB::table('belegung')->insert([
            'user'=>3,
            'kurs' =>'ALDA',
            'rolle'=>'Tutor'
        ]);
        DB::table('belegung')->insert([
            'user'=>2,
            'kurs' =>'WebTech',
            'rolle'=>'Student'
        ]);
    }
}