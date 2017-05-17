<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Belegung;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;

class BelegungController extends Controller
{
    public function index()
    {
        // get all the myinputs
        $kurse = Belegung::where('user','=',Auth::user()->id)->get();
        $alle=Belegung::all();
        // load the view and pass the myinputs
        return View::make('Kurse.kurse')->with('myinputs', $kurse)->with('alle',$alle);

    }

}
