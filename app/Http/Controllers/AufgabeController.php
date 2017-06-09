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
class AufgabeController extends Controller
{
//    public function read(Request $request){
//
//        $fach=1;
//        $aufgaben= db::table('aufgabe')->join('kurs','aufgabe.kurs','=','kurs.id')->where('kurs.id',$fach)->get();
//        return response()->json($aufgaben);
//    }
//
//
//    public function store(Request $request)
//    {
//
//        Aufgabe::create([
//            'aufgabenname'      =>  $request->aufgabenname,
//          'abgabedatum'         => Carbon::now()->format('d-m-Y'),
//            'aufgabenbeschreibung' =>  $request->aufgabenbeschreibung,
//            'erstellt_von' => Auth::user()->id,
//           'kurs'=> 1
//           //'kurs'=> $request->input('kurs')
//            //kurs schreibts nichtohne model
//
//        ]);
//
//    }
//
//    public function create(Request $request){
//        //mit Eloquent
//
//                $this->validate($request, [
//            'aufgabenname'       => 'required',
//            'abgabedatum'      => 'required',
//            'aufgabenbeschreibung' => 'required']);
//
//
//        $aufgabe = new AufgabeModel();
//        $aufgabe->aufgabenname = $request->aufgabenname;
//        $aufgabe->abgabedatum = Carbon::now()->format('d-m-Y');
//        $aufgabe->aufgabenbeschreibung = $request->input('aufgabenbeschreibung','');
//        $aufgabe-> erstellt_von = Auth::user()->id;
//        $aufgabe->kurs = $request->input('kurs','1');
//        $aufgabe->save();
//
//    }
//    public function update(Request $request)
//    {
//
//        $aufgabe = AufgabeModel::find($request->id);
//        $aufgabe->aufgabenname = $request->aufgabe;
//        $aufgabe->save();
//
//        return response()->json($aufgabe);
//
//    }
//


    public function store(Request $request)
    {
        // validate

        $this->validate($request, [
            'aufgabenname'       => 'required',
            'abgabedatum'      => 'required',
            'aufgabenbeschreibung' => 'required']);


        // store
        $id=Aufgabe::create([
            'aufgabenname'      =>  $request->aufgabenname,
            'abgabedatum'         => $request->abgabedatum,
            'aufgabenbeschreibung' =>  $request->aufgabenbeschreibung,
            'kurs'=> session()->get('global_variable'),
            'erstellt_von' => Auth::user()->id,
        ]);

        Activity::create([
            'abgabedatum'         => $request->abgabedatum,
            'aufgabenname'      =>  $request->aufgabenname,
            'zuordnung_aufgabe' => $id->id,
            'bearbeitet_von' => Auth::user()->name,
        ]);
        $users =DB::table('belegung')
            ->join('users', 'belegung.user', '=', 'users.id')
            ->select('users.id')
            ->where('belegung.kurs',session()->get('global_variable'))
            ->get();

        foreach($users as $user) {
            Abgabe::create([
                'zustand' => '.',
                'user' => $user->id,
                'zugehoerig_zu' => $id->id,
            ]);
        }
        return back();

    }


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

        if (Auth::check()) {


            // get all the myinputs
            $aufgabe = Aufgabe::all();
            // load the view and pass the myinputs
            return View::make('Professor.ProfMode')->with('myinputs', $aufgabe);
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

            // show the view and pass the myinput to it
            return View::make('Professor.ProfMode')->with('myinputs', $aufgabe);
        } else {

            return View::make('home');
        }
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

    public function accept(Request $request){


        // in db schreiben

        $pfad='/Professor/'.session()->get('global_variable');
     return  response('hallo');
        return view ('Professor.Profmode', ['myinputs'=>$request]);
    }


}
