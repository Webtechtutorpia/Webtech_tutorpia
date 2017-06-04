<?php

namespace Tutorpia\Http\Controllers;

use function MongoDB\BSON\toJSON;
use Tutorpia\User;
use Tutorpia\Belegung;
use Tutorpia\Aufgabe;
use Tutorpia\Abgabe;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AbgabeController extends Controller
{

    public function readAufgaben(Request $request){

        $fach=1;
        $tabelle = DB::table('aufgabe')->join('kurs','aufgabe.kurs','=','kurs.id')->where('kurs.id',$fach)->get();
        return response()->json($tabelle);

    }
    public function readUser(Request $request)
    {




        $abgabe = DB::table('abgabe')
            ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
            ->join('users', 'abgabe.user', '=', 'users.id')
            ->select('*')
            ->orderBy('users.name', 'asc')
            ->orderBy('users.id', 'asc')
            ->get();



        $user = $request->input('tfsearch', '');

        $alle= Abgabe::select('user')->get();
        $users =[
            'id'=> $request->input('id'),
            'users'=> User::where('name', 'like', $user . '%')->whereIn('id', $alle)->get(),
//                'users' => User::whereIn('id', Users::all())->get(),
            'aufgaben'=> Aufgabe::all(),
            'abgaben'=> $abgabe
        ];
        return response($users);

    }

    public function readAll(Request $request)
    {

        $user = $request->input('tfsearch', '');

        $users = DB::table('users')->join('abgabe', 'users.id', '=', 'abgabe.user')->select('users.name', 'abgabe.zustand')->where('name', 'like', $user . '%')->get();
        return response()->json($users);




    }

    public function index()
    {
         if(Auth::check()) {
             // get all the myinputs
             $aufgabe = Aufgabe::all();


             $alle = User::all();

             $abgabe = DB::table('abgabe')
                 ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
                 ->join('users', 'abgabe.user', '=', 'users.id')
                 ->select('*')
                 ->orderBy('users.name', 'asc')
                 ->orderBy('users.id', 'asc')
                 ->get();


             // load the view and pass the myinputs
             return View::make('Tutor.abgabe')->with('myinputs', $aufgabe)->with('ergebnismenge', $abgabe);
         }
         else {
             return View::make('home');
         }
    }
    public function show($kurs)
    {
        if (Auth::check()) {
            session()->put('global_variable', $kurs);
            // get the myinput
            $aufgabe = Aufgabe::where('kurs', '=', $kurs)->get();

            // SELECT * FROM `abgabe`,`aufgabe`,`users` WHERE abgabe.zugehoerig_zu=aufgabe.id and aufgabe.kurs=2 and abgabe.user=users.id order by users.id
            $abgabe = DB::table('abgabe')
                ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
                ->join('users', 'abgabe.user', '=', 'users.id')
                ->select('*')
                ->where('aufgabe.kurs', session()->get('global_variable'))
                ->orderBy('users.name', 'asc')
                ->orderBy('users.id', 'asc')
                ->get();
            // show the view and pass the myinput to it
            return View::make('Tutor.abgabe')->with('myinputs', $aufgabe)->with('ergebnismenge', $abgabe)->with('kurs',session()->get('global_variable'));
        } else {
            return View::make('home');
        }
    }

    public function UserAbgaben($id,$name){
        $abgabe = DB::table('abgabe')
            ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
            ->join('users', 'abgabe.user', '=', 'users.id')
            ->select('*')
            ->where('aufgabe.kurs', session()->get('global_variable'))
            ->where('users.id', $id)
            ->where('Aufgabe.aufgabenname','like',$name)
            ->orderBy('users.name', 'asc')
            ->get();
        return View::make('Tutor.Aufgabenkorrektur')->with('myinputs', $abgabe)->with('kurs',session()->get('global_variable'));
    }


}