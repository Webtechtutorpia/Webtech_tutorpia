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
            'kurs' =>2
        ]);
        DB::table('belegung')->insert([
            'user'=>3,
            'kurs' =>1
        ]);
    }
}
