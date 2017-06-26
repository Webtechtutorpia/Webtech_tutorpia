<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Abgabe;
use Tutorpia\Belegung;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class BelegungController extends Controller
{
    public function index()
    {
            // Kurse rausfinden aus Belegung für den User
            $kurse = Belegung::where('user', '=', Auth::user()->id)->get();
            //alle Kurse, die nicht in eigene Kurse für Eintragung herausfinden
            $alle=DB::table('kurs')->select('*')
                ->whereNotIn('bezeichnung',function($query)
                {
                    $query->select('kurs')
                        ->from('belegung')
                        ->where('user', '=', Auth::user()->id);
                })->get();

            return View::make('Kurse.kurse')->with('kurse', $kurse)->with('alle', $alle);

    }

    public function store(Request $request)
    {

        $this->validate($request, [ 'kurs'=> 'required']);
        $belegung=new Belegung(Auth::user()->id,$request->kurs,"Student");
        $check =Belegung::where('user', $belegung->getUser())->where('kurs', $belegung->getKurs())->get();
        if($check->isEmpty()) {

            $this->save($belegung);
        }
        return back();
    }

    private function save(Belegung $belegung){



            DB::table('belegung')->insert(
                ['user' => $belegung->getUser(), 'kurs' => $belegung->getKurs(), 'rolle' => $belegung->getRolle(), 'created_at' => Carbon::now()]
            );
            $aufgaben = DB::table('aufgabe')
                ->select('aufgabe.id')
                ->where('aufgabe.kurs', $belegung->getKurs())
                ->get();

            foreach ($aufgaben as $aufgabe) {
                DB::table('abgabe')
                    ->insert([
                        'zustand' => '.',
                        'user' => $belegung->getUser(),
                        'zugehoerig_zu' => $aufgabe->id,
                        'created_at' => Carbon::now()
                    ]);
            }

        return back();

    }

}
