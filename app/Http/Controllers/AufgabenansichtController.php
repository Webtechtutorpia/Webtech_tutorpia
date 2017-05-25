<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Aufgabe;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
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
        $abgabe= DB::table('abgabe')
            ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
            ->join('users', 'abgabe.user', '=', 'users.id')
            ->select('*')
            ->where('aufgabe.kurs',session()->get('global_variable'))
            ->where('users.id',Auth::user()->id)
           //->where('users.name',"TestStudent")
            ->orderBy('aufgabe.aufgabenname', 'asc')
            ->get();
        // show the view and pass the myinput to it
        return View::make('Aufgabenansicht.Aufgabenansicht_example')->with('myinputs', $abgabe);
    }
}
