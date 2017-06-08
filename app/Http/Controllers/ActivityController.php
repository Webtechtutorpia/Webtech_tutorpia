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
//            global $merker;

            // get all the myinputs
            $activity = DB::table('activity')
                ->select('*')
                ->join('abgabe', 'activity.zuordnung_abgabe', '=', 'abgabe.abgabeid')
                ->where('activity.user','=',Auth::user()->id)
                ->orderBy('activity.created_at', 'desc')
                ->get();
//            $length=$activity->count();
//            session()->put('anzahlzeilen',$activity->count() );
//            if($length != (session()->get('anzahlzeilen'))){
//               $merker=true;
//            }

            // load the view and pass the myinputs
            return View::make('Activity.overview')->with('myinputs', $activity);
        }
        else {
            return View::make('home');
        }
    }

}
