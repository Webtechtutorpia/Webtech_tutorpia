<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'bearbeitet_von'=>'TestTutor',
            'updated_at'=>'2017-04-15 16:22:28',
            'pfad' => 'app/files/TestStudent_Aufgabe1_Neues Textdokument.txt',
            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
    ]);

        DB::table('abgabe')->insert([
            'zustand' => '-',
            'user' => 1,
            'zugehoerig_zu' => 2,
            'kommentar'=>'leider zu viele Fehler',
            'bearbeitet_von'=>'TestTutor',
            'updated_at'=>'2017-05-03 12:00:28',
            'pfad' => 'app/files/TestStudent_Aufgabe2_Neues Textdokument.txt',
            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
        ]);

        DB::table('abgabe')->insert([
            'zustand' => '/',
            'user' => 1,
            'zugehoerig_zu' => 3,
            'created_at'=>'2017-05-15 14:06:00',
            'pfad' => 'app/files/TestStudent_Aufgabe3_Neues Textdokument.txt',
            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),

        ]);

        DB::table('abgabe')->insert([
            'zustand' => '.',
            'user' => 1,
            'zugehoerig_zu' => 4,
            'created_at'=>'2017-05-29 16:22:28',
            'upload_am'=> '2017-04-15 16:22:28'

        ]);

        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 1,
            'zugehoerig_zu' => 5,
            'kommentar'=>'super gemacht',
            'bearbeitet_von'=>'TestTutor',
            'updated_at'=>'2017-06-01 18:22:28',
            'pfad' => 'app/files/TestStudent_Aufgabe5_Neues Textdokument.txt',
            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
        ]);
        DB::table('abgabe')->insert([
            'zustand' => '+',
            'user' => 2,
            'zugehoerig_zu' => 6,
            'kommentar'=>'super gemacht',
            'bearbeitet_von'=>'TestTutor',
            'updated_at'=>'2017-06-01 18:22:28',
            'pfad' => 'app/files/TestStudent_Aufgabe5_Neues Textdokument.txt',
            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
        ]);
//
//        DB::table('abgabe')->insert([
//            'zustand' => '+',
//            'user' => 2,
//            'zugehoerig_zu' => 1,
//            'kommentar'=>'perfekt',
//            'bearbeitet_von'=>'TestTutor',
//            'updated_at'=>'2017-04-15 16:22:28',
//            'pfad' => 'app/files/TestStudent_Aufgabe3_Neues Textdokument.txt',
//            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
//            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
//        ]);
//
//        DB::table('abgabe')->insert([
//            'zustand' => '-',
//            'user' => 2,
//            'zugehoerig_zu' => 2,
//            'kommentar'=>'zu ungenau',
//            'bearbeitet_von'=>'TestTutor',
//            'updated_at'=>'2017-05-03 12:00:28',
//            'pfad' => 'app/files/TestStudent_Aufgabe3_Neues Textdokument.txt',
//            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
//            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
//        ]);
//
//        DB::table('abgabe')->insert([
//            'zustand' => '-',
//            'user' => 2,
//            'zugehoerig_zu' => 3,
//            'kommentar'=>'zu wenig',
//            'bearbeitet_von'=>'TestTutor',
//            'created_at'=>'2017-05-15 14:06:00',
//            'pfad' => 'app/files/TestStudent_Aufgabe3_Neues Textdokument.txt',
//            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
//            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
//        ]);
//
//        DB::table('abgabe')->insert([
//            'zustand' => '+',
//            'user' => 2,
//            'zugehoerig_zu' => 4,
//            'kommentar'=>'super',
//            'bearbeitet_von'=>'TestTutor',
//            'updated_at'=>'2017-06-09 16:22:28',
//            'pfad' => 'app/files/TestStudent_Aufgabe3_Neues Textdokument.txt',
//            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
//            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
//        ]);
//
//        DB::table('abgabe')->insert([
//            'zustand' => '+',
//            'user' => 2,
//            'zugehoerig_zu' => 5,
//            'kommentar'=>'passt alles',
//            'bearbeitet_von'=>'TestTutor',
//            'updated_at'=>'2017-06-09 16:22:28',
//            'pfad' => 'app/files/TestStudent_Aufgabe3_Neues Textdokument.txt',
//            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
//            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
//        ]);
//        DB::table('abgabe')->insert([
//            'zustand' => '-',
//            'user' => 1,
//            'zugehoerig_zu' => 6,
//            'kommentar'=>'nochmal machen',
//            'bearbeitet_von'=>'TestTutor',
//            'updated_at'=>'2017-06-09 16:22:28',
//            'pfad' => 'app/files/TestStudent_Aufgabe3_Neues Textdokument.txt',
//            'upload_am'=> Carbon::now()->format('d-m-Y H:i:s'),
//            'korrigiert_am'=>Carbon::now()->format('d-m-Y H:i:s')
//        ]);

    }
}
