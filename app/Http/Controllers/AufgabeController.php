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
        // $aufgabe = new Aufgabe('h','b','c','d','e');
        // validate

        $this->validate($request, [
            'aufgabenname' => 'required',
            'abgabedatum' => 'required',
            'aufgabenbeschreibung' => 'required']);

        $this->save($aufgabe);
        $pfad='/Professor/'.session()->get('global_variable');

        return redirect($pfad);
    }
    private function save(Aufgabe $aufgabe){
//         //store
//
        DB::table("aufgabe")->insert(['aufgabenname'      =>  $aufgabe->getAufgabenname(),
            'abgabedatum'         => $aufgabe->getAbgabedatum(),
            'aufgabenbeschreibung' =>  $aufgabe->getAufgabenbeschreibung(),
            'erstellt_von' =>  $aufgabe->getErstellt_von(),
            'kurs'=> $aufgabe->getKurs()]);

        $id = Aufgabe::orderBy('id', 'desc')->first();




        $users =DB::table('belegung')
            ->join('users', 'belegung.user', '=', 'users.id')
            ->select('users.id')
            ->where('belegung.kurs',session()->get('global_variable'))
            ->where('belegung.rolle','=','Student')
            ->get();

        foreach($users as $user) {
            Abgabe::create([
                'zustand' => '.',
                'user' => $user->id,
                'zugehoerig_zu' => $id->id,
            ]);
            DB::table("activity")->insert([
                'zeit'=>Carbon::now(),
                'zuordnung_aufgabe'=>$id->id,
                'was'=>'aufgabe',
                'user'=>$user->id]);
        }

    }


//    public function store(Request $request)
//    {
//        // validate
//
//        $this->validate($request, [
//            'aufgabenname'       => 'required',
//            'abgabedatum'      => 'required',
//            'aufgabenbeschreibung' => 'required']);
//
//
//        // store
//        $id=Aufgabe::create([
//            'aufgabenname'      =>  $request->aufgabenname,
//            'abgabedatum'         => $request->abgabedatum,
//            'aufgabenbeschreibung' =>  $request->aufgabenbeschreibung,
//            'kurs'=> session()->get('global_variable'),
//            'erstellt_von' => Auth::user()->name,
//        ]);
//

//        $users =DB::table('belegung')
//            ->join('users', 'belegung.user', '=', 'users.id')
//            ->select('users.id')
//            ->where('belegung.kurs',session()->get('global_variable'))
//            ->get();
//
//        foreach($users as $user) {
//            Abgabe::create([
//                'zustand' => '.',
//                'user' => $user->id,
//                'zugehoerig_zu' => $id->id,
//            ]);
//        }
//        $pfad='/Professor/'.session()->get('global_variable');
//
//        return redirect($pfad);
//
//
//    }


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


    public function index()
    {




            // get all the myinputs
            $aufgabe = Aufgabe::all();
            // load the view and pass the myinputs
            return View::make('Professor.ProfMode')->with('myinputs', $aufgabe);

    }
    public function show($kurs)
    {

            session()->put('global_variable', $kurs);
            // get the myinput
            $aufgabe = Aufgabe::where('kurs', '=', $kurs)->get();

            // show the view and pass the myinput to it
            return View::make('Professor.ProfMode')->with('myinputs', $aufgabe);

    }
    public function destroy($id)
    {
        // delete
        $activity=Activity::where('zuordnung_aufgabe',$id)->first();
        $activity->delete();

        Abgabe::where('zugehoerig_zu',$id)->delete();


        $aufgabe = Aufgabe::find($id);
        $aufgabe->delete();


        // redirect
        return back();
    }

    public function confirmsite(Request $request)
    {
//        $parameter=[
//            'name'=>'Aufgabe5',
//            'datum'=>'27.05.2022 21:59',
//            'beschreibung'=>'Das ist eine Testaufgabe'
//        ];
        return view ('Professor.anlegen_bestaetigung', ['request'=>$request]);
    }
    public function reset(Request $request){
        $pfad='/Professor/'.session()->get('global_variable');
//      return response('hallo');
         return redirect($pfad);

    }




}
