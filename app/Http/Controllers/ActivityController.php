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


            // get all the myinputs
//            $activity = DB::table('activity')
//                ->select('*')
//                ->join('abgabe', 'activity.zuordnung_abgabe', '=', 'abgabe.abgabeid')
//                ->where('activity.user','=',Auth::user()->id)
//                ->orderBy('activity.created_at', 'desc')
//                ->get();
            $abgabe = DB::table('abgabe')
                ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
                ->select('*')
                ->where('abgabe.user','=',Auth::user()->id)
                ->get();


            // load the view and pass the myinputs
            return View::make('Activity.overview')->with('myinputs', $abgabe);
        }
        else {
            return View::make('home');
        }
    }

}
