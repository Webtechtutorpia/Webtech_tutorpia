<?php

namespace Tutorpia\Http\Controllers;


use View;

use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Tutorpia\Activity;
use Auth;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class KorrekturController extends Controller
{

    public function UserAbgaben($id,$name){
        session()->put('userid', $id);
        session()->put('aufgabenname', $name);
        $aufgabenid=DB::table('aufgabe')
            ->select('id')
            ->where('aufgabenname','like',$name)
            ->get();
        foreach($aufgabenid as $wert){
            session()->put('aufgabenid', $wert->id);

        }




        $abgabe = DB::table('abgabe')
            ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
            ->join('users', 'abgabe.user', '=', 'users.id')
            ->select('*')
            ->where('aufgabe.kurs', session()->get('global_variable'))
            ->where('users.id', $id)
            ->where('aufgabe.aufgabenname','like',$name)
            ->orderBy('users.name', 'asc')
            ->get();
      

            return View::make('Tutor.Aufgabenkorrektur')->with('myinputs', $abgabe)->with('kurs',session()->get('global_variable'));

    }



    public function store(Request $request)
    {
        // validate
        global $zustand;
        $this->validate($request, [
            'kommentar'       => 'required',
            'bewertung'       => 'required']);
        if($request->bewertung=='abnehmen'){
            $zustand='+';
        }
        if($request->bewertung=='ablehnen'){
            $zustand='-';
        }

        $update = [['zustand' => $zustand],['kommentar'=>$request->kommentar]];
        DB::table('abgabe')
            ->where('user','=',session()->get('userid'))
            ->where('zugehoerig_zu','=',session()->get('aufgabenid'))
            ->update( array('zustand' => $zustand, 'kommentar'=>$request->kommentar,'bearbeitet_von'=>Auth::user()->name,'updated_at'=>date('Y-m-d H:i:s'), 'korrigiert_am'=> date('d-m-Y H:i:s')));

        Activity::create([
            'aufgabenname'=>session()->get('aufgabenname'),
            'zuordnung_abgabe' => session()->get('aufgabenid'),
            'bearbeitet_von' => Auth::user()->name,
            'user'=>session()->get('userid')
        ]);

        return redirect()->action('AbgabeController@show', ['kurs' => session()->get('global_variable')]
    );

    }

}
