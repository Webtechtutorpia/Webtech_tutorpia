<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Belegung;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
use Illuminate\Support\Facades\DB;

class BelegungController extends Controller
{
    public function index()
    {
        if (Auth::check()) {


            // get all the myinputs
            $kurse = Belegung::where('user', '=', Auth::user()->id)->get();
            $alle = DB::table('belegung')->where('user', '!=', Auth::user()->id)
                ->where('rolle','!=','Professor')->get();
            // load the view and pass the myinputs
            return View::make('Kurse.kurse')->with('myinputs', $kurse)->with('alle', $alle);
        }
        else {
            return View::make('home');
        }
    }
    public function store(Request $request)
    {
        // validate
        
        $users =DB::table('belegung')
            ->join('users', 'belegung.user', '=', 'users.id')
            ->select('users.id')
            ->where('belegung.kurs',session()->get('global_variable'))
            ->get();


        return back();

    }

}
