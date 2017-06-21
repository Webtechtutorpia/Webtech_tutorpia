<?php

namespace Tutorpia\Http\Controllers;


use View;
use Tutorpia\Abgabe;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Tutorpia\Activity;
use Auth;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class KorrekturController extends Controller
{

    public function UserAbgaben($id,$name){
        session()->put('userid', $id);
        session()->put('aufgabenname', $name);
       //Aufagbenid aus Tabelle herausfinden
        $aufgabenid=DB::table('aufgabe')
            ->select('id')
            ->where('aufgabenname','like',$name)
            ->get();
        foreach($aufgabenid as $wert){
            session()->put('aufgabenid', $wert->id);
        }
        //Abgabe von bestimmten User und jeweiligen Kurs und jeweilige AUfgabe herausfinden
        $abgabe = DB::table('abgabe')
            ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
            ->join('users', 'abgabe.user', '=', 'users.id')
            ->select('*')
            ->where('aufgabe.kurs', session()->get('global_variable'))
            ->where('users.id', $id)
            ->where('aufgabe.aufgabenname','like',$name)
            ->orderBy('users.name', 'asc')
            ->get();

            return View::make('Tutor.Aufgabenkorrektur')->with('abgaben', $abgabe)->with('kurs',session()->get('global_variable'));
    }



    public function store(Request $request)
    {
        // validate
        global $zustand;
        $this->validate($request, [
            'kommentar' => 'required',
            'bewertung' => 'required']);
        if($request->bewertung=='abnehmen'){
            $zustand='+';
        }
        if($request->bewertung=='ablehnen'){
            $zustand='-';
        }
        $abgabe = new Abgabe($zustand,session()->get('userid'),session()->get('aufgabenid'),$request->kommentar,Auth::user()->name,"","",date('d-m-Y H:i:s'));
        $this->save($abgabe);
        return redirect()->action('AbgabeController@show', ['kurs' => session()->get('global_variable')]);

    }
    private function save(Abgabe $abgabe){
        //bewertete Abgabe abspeichern
        DB::table('abgabe')
            ->where('user','=',$abgabe->getUser())
            ->where('zugehoerig_zu','=',$abgabe->getZugehoerig_zu())
            ->update( array('zustand' => $abgabe->getZustand(), 'kommentar'=>$abgabe->getKommentar(),'bearbeitet_von'=>$abgabe->getBearbeitet_von(),'updated_at'=>Carbon::now(), 'korrigiert_am'=> $abgabe->getKorrigiert_am()));

        $id=DB::table('abgabe')
            ->select('abgabeid')
            ->where('user','=',$abgabe->getUser())
            ->where('zugehoerig_zu','=',$abgabe->getZugehoerig_zu())
            ->orderBy('abgabeid', 'desc')->first();

        //Neuigkeit dazu abspeichern
        $activity = new Activity(Carbon::now(),session()->get('aufgabenid'),$id->abgabeid,'abgabe', session()->get('userid'));
        DB::table("activity")->insert([
            'zeit'=>$activity->getZeit(),
            'zuordnung_aufgabe'=>$activity->getZuordnung_aufgabe(),
            'zuordnung_abgabe'=>$activity->getZuordnung_abgabe(),
            'was'=>$activity->getWas(),
            'user'=>$activity->getUser(),
            'created_at'=>Carbon::now()]);




    }

}
