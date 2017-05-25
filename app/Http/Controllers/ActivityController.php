<?php

namespace Tutorpia\Http\Controllers;


use Tutorpia\Activity;
use Tutorpia\Aufgabe;
use Tutorpia\Belegung;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
use Tutorpia\user;

class ActivityController extends Controller
{
    public function index()
    {
        // get all the myinputs
        $activity = Activity::all();

        // load the view and pass the myinputs
        if(Auth::user()){
            return View::make('Activity.overview')->with('myinputs', $activity);
        }
        else {
            return view::make('home');
        }

    }
}
