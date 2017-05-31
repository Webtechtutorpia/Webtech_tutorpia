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
            $activity = DB::table('activity')
                ->select('*')
                ->orderBy('created_at', 'desc')
                ->get();

            // load the view and pass the myinputs
            return View::make('Activity.overview')->with('myinputs', $activity);
        }
        else {
            return View::make('home');
        }
    }

}
