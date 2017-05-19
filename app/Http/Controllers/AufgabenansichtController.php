<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Aufgabe;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;

class AufgabenansichtController extends Controller
{
    public function index()
    {
        // get all the myinputs
        $abgabe = Aufgabe::all();

        // load the view and pass the myinputs
        return View::make('Aufgabenansicht.Aufgabenansicht_example')->with('myinputs', $abgabe);

    }
}
