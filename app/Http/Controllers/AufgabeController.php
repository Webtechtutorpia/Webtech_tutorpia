<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Aufgabe;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
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
        Aufgabe::create([
            'aufgabenname'      =>  $request->aufgabenname,
            'abgabedatum'         => $request->abgabedatum,
            'aufgabenbeschreibung' =>  $request->aufgabenbeschreibung,
            'erstellt_von' => Auth::user()->id,
        ]);
        $aufgabe = Aufgabe::all();
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
        // get all the myinputs
        $aufgabe = Aufgabe::all();
        // load the view and pass the myinputs
        return View::make('Professor.ProfMode')->with('myinputs', $aufgabe);

    }
    public function show($kurs)
    {
        // get the myinput
        $aufgabe = Aufgabe::where('kurs','=',$kurs)->get();

        // show the view and pass the myinput to it
        return View::make('Professor.ProfMode')->with('myinputs', $aufgabe);
    }
    public function destroy($id)
    {
        // delete
        $aufgabe = Aufgabe::find($id);
        $aufgabe->delete();
        // redirect
        return back();
    }





}
