<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Abgabe;
use Tutorpia\Belegung;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
use Illuminate\Support\Facades\DB;
class BelegungController extends Controller
{
    public function index()
    {
        if (Auth::check()) {


            // get all the myinputs
            $kurse = Belegung::where('user', '=', Auth::user()->id)->get();
            global $alle;
            foreach($kurse as $kurs) {

                $alle =DB::table('belegung')->where('kurs', '!=', $kurs->id)
                    ->where('rolle', '!=', 'Professor')->get();
            }
            // load the view and pass the myinputs
            return View::make('Kurse.kurse')->with('myinputs', $kurse)->with('alle', $alle);
        }
        else {
            return View::make('home');
        }
    }
    public function store(Request $request)
    {
        // validate

        DB::table('belegung')->insert(
            ['user' => Auth::user()->id, 'kurs' => $request->kurs, 'rolle'=>$request->rolle]
        );
        $aufgaben =DB::table('aufgabe')
            ->select('aufgabe.id')
            ->where('aufgabe.kurs',$request->kurs)
            ->get();

        foreach($aufgaben as $aufgabe) {
            Abgabe::create([
                'zustand' => '.',
                'user' => Auth::user()->id,
                'zugehoerig_zu' => $aufgabe->id,
            ]);
        }

        return back();

    }

}
