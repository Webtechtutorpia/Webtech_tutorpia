<?php

namespace Tutorpia\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Auth;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AufgabenansichtController extends Controller
{
    public function index()
    {

        if (Auth::check()) {


            // get all the myinputs
            $abgabe = Aufgabe::all();

            // load the view and pass the myinputs
            return View::make('Aufgabenansicht.Aufgabenansicht_example')->with('myinputs', $abgabe);
        }
        else {
            return View::make('home');
        }
    }
    public function show($kurs)
    {

            session()->put('global_variable', $kurs);

            // SELECT * FROM `abgabe`,`aufgabe`,`users` WHERE abgabe.zugehoerig_zu=aufgabe.id and aufgabe.kurs=2 and abgabe.user=users.id order by users.id
            $abgabe = DB::table('abgabe')
                ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
                ->join('users as student', 'abgabe.user', '=', 'student.id')
                ->leftjoin('users as tutor', 'abgabe.bearbeitet_von', '=', 'tutor.name')
                ->select('abgabe.*','student.*','tutor.email as tutoremail','aufgabe.*')
                ->where('aufgabe.kurs', session()->get('global_variable'))
                ->where('student.id', Auth::user()->id)
                //->where('users.name',"TestStudent")
                ->orderBy('aufgabe.aufgabenname', 'asc')
                ->get();
            // show the view and pass the myinput to it
//              return response($abgabe);
            return View::make('Aufgabenansicht.Aufgabenansicht_example')->with('myinputs', $abgabe)->with('kurs',session()->get('global_variable'));

    }

    public function matchHTML(Request $request)
    {
        $cities=$this->queryName($request);
        return view('Aufgabenansicht.gesuchteAufgabe',['cities'=>$cities,'kurs'=>session()->get('global_variable')]);


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
