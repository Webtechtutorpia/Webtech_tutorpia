<?php

namespace Tutorpia\Http\Controllers;


use Tutorpia\Activity;
use Tutorpia\Aufgabe;
use Tutorpia\Belegung;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
use Illuminate\Support\Facades\DB;
use Tutorpia\user;

class ActivityController extends Controller
{
    public function index()
    {
        if(Auth::check()) {

            $abgabe = DB::table('abgabe')
                ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
                ->select('abgabe.updated_at as abgabeupdated_at','abgabe.*','aufgabe.*')
                ->where('abgabe.user','=',Auth::user()->id)
                ->orderBy('abgabeupdated_at','desc')
                ->get();


            // load the view and pass the myinputs
            return View::make('Activity.overview')->with('myinputs', $abgabe);
        }
        else {
            return View::make('home');
        }
    }

}
