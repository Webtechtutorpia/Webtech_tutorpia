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


//            $abgabe = DB::table('abgabe')
//                ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
//                ->select('abgabe.updated_at as abgabeupdated_at','abgabe.*','aufgabe.*')
//                ->where('abgabe.user','=',Auth::user()->id)
//                ->orderBy('abgabeupdated_at','desc')
//                ->get();

        $abgabe=DB::table('activity')
            ->leftjoin('aufgabe','activity.zuordnung_aufgabe','aufgabe.id')
            ->leftjoin('abgabe','activity.zuordnung_abgabe','abgabe.abgabeid')
            ->select('*')
            ->where('activity.user','=',Auth::user()->id)
            ->orderBy('activity.zeit','desc')
            ->paginate(8);
//        if(count($abgabe)>=10){
//
//        }


            // load the view and pass the myinputs
            return View::make('Activity.overview')->with('myinputs', $abgabe);

    }

    public function ajax(){
//        $abgaben = DB::table('abgabe')
//            ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
//            ->select('abgabe.updated_at as abgabeupdated_at','abgabe.*','aufgabe.*')
//            ->where('abgabe.user','=',Auth::user()->id)
//            ->orderBy('abgabeupdated_at','desc')
//            ->get();
//        foreach ($abgaben as $abgabe){
//
//                $abgabe->abgabeupdated_at = Carbon::parse($abgabe->abgabeupdated_at)->format('d-m-Y H:i:s');
//
//        }
        $abgabe=DB::table('activity')
            ->leftjoin('aufgabe','activity.zuordnung_aufgabe','aufgabe.id')
            ->leftjoin('abgabe','activity.zuordnung_abgabe','abgabe.abgabeid')
            ->select('*')
            ->where('activity.user','=',Auth::user()->id)
            ->orderBy('activity.zeit','desc')
            ->get();


        // load the view and pass the myinputs
        return View::make('Activity.overview')->with('myinputs', $abgabe);

        return response($abgaben);
    }

}
