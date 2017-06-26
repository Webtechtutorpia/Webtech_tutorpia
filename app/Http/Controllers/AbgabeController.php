<?php

namespace Tutorpia\Http\Controllers;

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

    public function readUser(Request $request)
    {
        $kurs = session()->get('global_variable');
        $belegung = Belegung::select('user')->where('belegung.rolle', 'Student')->where('belegung.kurs', $kurs)->get()->toArray();
        $abgabe = DB::table('abgabe')
            ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
            ->join('users', 'abgabe.user', '=', 'users.id')
            ->select('*')->where('aufgabe.kurs', $kurs)
            ->whereIn('users.id', $belegung)
            ->orderBy('users.name', 'asc')
            ->orderBy('users.id', 'asc')
            ->get();


        $user = $request->input('tfsearch', '');

        $alle = Abgabe::select('user')->whereIn('user', $belegung)->get();
        $belegung = Belegung::all();
        $users = [
            'id' => $request->input('id'),
            'users' => User::select('name', 'id')->where('name', 'like', $user . '%')->whereIn('id', $alle)->get(),
            'aufgaben' => Aufgabe::select('aufgabenname')->where('kurs', $kurs)->get(),
            'abgaben' => $abgabe


        ];
        return response($users);

    }


    public function show($kurs)
    {
        session()->put('global_variable', $kurs);
        // alle Aufgaben mit übergebenen Kurs rausfinden
        $aufgabe = Aufgabe::where('kurs', '=', $kurs)->get();
        //für Zwischenabfrage alle Belegungen von Studenten mit richtigem Kurs rausfinden
        $belegung = Belegung::select('user')->where('belegung.rolle', 'Student')->where('belegung.kurs', $kurs)->get()->toArray();
        //alle Abgaben auslesen
        $abgabe = DB::table('abgabe')
            ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
            ->join('users', 'abgabe.user', '=', 'users.id')
            ->select('*')
            ->where('aufgabe.kurs', session()->get('global_variable'))
            ->whereIn('users.id', $belegung)
            ->orderBy('users.name', 'asc')
            ->orderBy('users.id', 'asc')
            ->get();
        return View::make('Tutor.abgabe')->with('aufgabe', $aufgabe)->with('ergebnismenge', $abgabe)->with('kurs', session()->get('global_variable'));

    }


}