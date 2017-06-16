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



            // get all the myinputs
            $kurse = Belegung::where('user', '=', Auth::user()->id)->get();
            $alle=DB::table('kurs')->select('*')
                ->whereNotIn('bezeichnung',function($query)
                {
                    $query->select('kurs')
                        ->from('belegung')
                        ->where('user', '=', Auth::user()->id);
                })->get();

//
            return View::make('Kurse.kurse')->with('myinputs', $kurse)->with('alle', $alle);
        //}

    }
    public function store(Request $request)
    {
        // validate

        DB::table('belegung')->insert(
            ['user' => Auth::user()->id, 'kurs' => $request->kurs, 'rolle'=>'Student']
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
