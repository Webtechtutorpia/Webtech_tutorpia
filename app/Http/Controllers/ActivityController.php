<?php

namespace Tutorpia\Http\Controllers;


use Tutorpia\Activity;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index()
    {
        // get all the myinputs
        $activity = Activity::all();
        $activity= DB::table('activity')
            ->select('*')
            ->orderBy('created_at', 'desc')
            ->get();

        // load the view and pass the myinputs
        return View::make('Activity.overview')->with('myinputs', $activity);

    }
}
