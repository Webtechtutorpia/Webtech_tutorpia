<?php

namespace Tutorpia\Http\Controllers;


use Tutorpia\Aufgabe;
use Tutorpia\Activity;
use Tutorpia\Abgabe;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AufgabeController extends Controller
{

    public function store(Request $request)
    {
        $aufgabe = new Aufgabe($request->aufgabenname, $request->abgabedatum, $request->aufgabenbeschreibung, Auth::user()->name,session()->get('global_variable'));

        $this->save($aufgabe);
        $pfad='/Professor/'.session()->get('global_variable');
        return redirect($pfad);
    }
    //Speicherung alle relevanten Daten bei Aufgabenerstellung
    private function save(Aufgabe $aufgabe){
    //speichern Aufgabe
        DB::table("aufgabe")->insert(['aufgabenname'      =>  $aufgabe->getAufgabenname(),
            'abgabedatum'         => $aufgabe->getAbgabedatum(),
            'aufgabenbeschreibung' =>  $aufgabe->getAufgabenbeschreibung(),
            'erstellt_von' =>  $aufgabe->getErstellt_von(),
            'kurs'=> $aufgabe->getKurs(),
            'created_at'=>Carbon::now()]);
    //ID gespeicherte Aufgabe rausfinden
        $id = Aufgabe::orderBy('id', 'desc')->first();

    //User die Aufgabe lösen müssen rausfinden
        $users =DB::table('belegung')
            ->join('users', 'belegung.user', '=', 'users.id')
            ->select('belegung.rolle as belegungrolle','users.id')
            ->where('belegung.kurs',session()->get('global_variable'))
            ->get();

    //in Belegung und Activity einfügen
        foreach($users as $user) {
            if($user->belegungrolle == 'Student') {
                $abgabe = new Abgabe( ".",$user->id, $id->id,"","","","","");
                DB::table("abgabe")->insert([
                    'zustand'=>$abgabe->getZustand(),
                    'user'=>$abgabe->getUser(),
                        'zugehoerig_zu'=>$abgabe->getZugehoerig_zu(),
                        'created_at'=>Carbon::now()
                  ]
                );
            }
            $activity = new Activity(Carbon::now(),$id->id,null,'aufgabe',$user->id);
            DB::table("activity")->insert([
                'zeit'=>$activity->getZeit(),
                'zuordnung_aufgabe'=>$activity->getZuordnung_aufgabe(),
                'was'=>$activity->getWas(),
                'user'=>$activity->getUser(),
                'created_at'=>Carbon::now()]);
        }

    }


//Aufgabe ändern
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'aufgabenname'       => 'required',
            'abgabedatum'      => 'required',
            'aufgabenbeschreibung' => 'required']);
        $aufgabe = Aufgabe::find($id);
        $aufgabe->update($request->all());

        return back();
    }


    //Alle Aufgaben aus Kurs darstellen
    public function show($kurs)
    {
            session()->put('global_variable', $kurs);
            // get the myinput
            $aufgabe = Aufgabe::where('kurs', '=', $kurs)->get();

            // show the view and pass the myinput to it
            return View::make('Professor.ProfMode')->with('aufgaben', $aufgabe);

    }
    //Aufgabe löschen
    public function destroy($id)
    {
        // delete
        $activity=Activity::where('zuordnung_aufgabe',$id)->first();
        if($activity !=null) {
            $activity->delete();
        }
        Abgabe::where('zugehoerig_zu',$id)->delete();


        $aufgabe = Aufgabe::find($id);
        $aufgabe->delete();


        // redirect
       return back();

    }

    //Bestätigungsseite
    public function confirmsite(Request $request)
    {
        return view ('Professor.anlegen_bestaetigung', ['request'=>$request]);
    }
    public function reset(Request $request){
        $pfad='/Professor/'.session()->get('global_variable');
         return redirect($pfad);

    }




}
