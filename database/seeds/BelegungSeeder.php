<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'rolle'=>'Professor',
            'created_at'=>Carbon::now()
        ]);

        DB::table('belegung')->insert([
            'user'=>3,
            'kurs' =>'ALDA',
            'rolle'=>'Tutor',
            'created_at'=>Carbon::now()
        ]);
        DB::table('belegung')->insert([
            'user'=>1,
            'kurs' =>'ALDA',
            'rolle'=>'Student',
            'created_at'=>Carbon::now()
        ]);
        DB::table('belegung')->insert([
            'user'=>2,
            'kurs' =>'BESY',
            'rolle'=>'Student',
            'created_at'=>Carbon::now()
        ]);

        DB::table('belegung')->insert([
            'user'=>4,
            'kurs' =>'Webtech',
            'rolle'=>'Professor',
            'created_at'=>Carbon::now()
        ]);
        DB::table('belegung')->insert([
            'user'=>4,
            'kurs'=>'ALDA',
            'rolle'=>'Professor',
            'created_at'=>Carbon::now()
        ]);


    }
}
