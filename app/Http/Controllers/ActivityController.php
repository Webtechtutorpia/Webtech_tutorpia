<?php

namespace Tutorpia\Http\Controllers;


use Tutorpia\Activity;
use Tutorpia\Belegung;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;

class ActivityController extends Controller
{
    public function index()
    {
        // get all the myinputs
        $aufgabe = Activity::all();
        // load the view and pass the myinputs
        return View::make('Activity.overview')->with('myinputs', $aufgabe);

    }
}
