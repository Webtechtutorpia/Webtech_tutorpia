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
use Carbon\Carbon;
class ActivityController extends Controller
{
    public function index()
    {
        //erste 15 Activity werden aus Tabelle gelesen und nach neueste Datum zuerst sortiert
        $neuigkeiten=DB::table('activity')
            ->leftjoin('aufgabe','activity.zuordnung_aufgabe','aufgabe.id')
            ->leftjoin('abgabe','activity.zuordnung_abgabe','abgabe.abgabeid')
            ->select('aufgabe.erstellt_von', 'aufgabe.aufgabenname', 'aufgabe.abgabedatum','aufgabe.kurs','zeit','was','bearbeitet_von')
            ->where('activity.user','=',Auth::user()->id)
            ->orderBy('activity.zeit','desc')
            ->paginate(8);

            return View::make('Activity.overview')->with('neuigkeiten', $neuigkeiten);

    }

    public function ajax(){


        $neuigkeiten=DB::table('activity')
            ->leftjoin('aufgabe','activity.zuordnung_aufgabe','aufgabe.id')
            ->leftjoin('abgabe','activity.zuordnung_abgabe','abgabe.abgabeid')
            ->select('aufgabe.erstellt_von', 'aufgabe.aufgabenname', 'aufgabe.abgabedatum','aufgabe.kurs','zeit','was','bearbeitet_von')
            ->where('activity.user','=',Auth::user()->id)
            ->orderBy('activity.zeit','desc')
            ->get();

        return response($neuigkeiten);
    }

}
