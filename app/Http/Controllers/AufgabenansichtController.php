<?php

namespace Tutorpia\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Auth;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AufgabenansichtController extends Controller
{

    public function show($kurs)
    {
            session()->put('global_variable', $kurs);
        //Alle Abgaben von bestimmten User und Kurs auslesen und mit Aufgabenname sortieren
            $abgabe = DB::table('abgabe')
                ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
                ->join('users as student', 'abgabe.user', '=', 'student.id')
                ->leftjoin('users as tutor', 'abgabe.bearbeitet_von', '=', 'tutor.name')
                ->select('abgabe.*','student.*','tutor.email as tutoremail','aufgabe.*')
                ->where('aufgabe.kurs', session()->get('global_variable'))
                ->where('student.id', Auth::user()->id)
                ->orderBy('aufgabe.aufgabenname', 'asc')
                ->get();

            return View::make('Aufgabenansicht.Aufgabenansicht')->with('abgaben', $abgabe)->with('kurs',session()->get('global_variable'));

    }

    public function gesuchteAufgabe(Request $request)
    {
        $abgaben=$this->queryName($request);
        return view('Aufgabenansicht.gesuchteAufgabe',['abgaben'=>$abgaben,'kurs'=>session()->get('global_variable')]);

    }

    private function queryName(Request $request){
        if (isset($request->name)) {
            $prefix = $request->name;
        } else {
            $prefix = '';
        }
        if ($prefix !== '') {
            //Abgaben aus Tabelle lesen, wo Aufgabenname gleich ist wie gesuchte Eingabe
            $name = DB::table('abgabe')
                ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
                ->join('users as student', 'abgabe.user', '=', 'student.id')
                ->leftjoin('users as tutor', 'abgabe.bearbeitet_von', '=', 'tutor.name')
                ->select('abgabe.*','student.*','tutor.email as tutoremail','aufgabe.*')
                ->where('aufgabe.kurs', session()->get('global_variable'))
                ->where('student.id', Auth::user()->id)
                ->where('aufgabe.aufgabenname','like',$prefix.'%')
                ->orderBy('aufgabe.aufgabenname', 'asc')
                ->get();

        }
        return $name;

    }


    public function destroy($id)
    {
        // delete
        DB::table('abgabe')->where('abgabeid',$id)->update(['zustand'=>'.']);

        // redirect
        return back();
    }

}
