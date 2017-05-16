<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Kurse;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;

class KurseController extends Controller
{
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
        $kurse = Kurse::all();
        // load the view and pass the myinputs
        return View::make('Tutor.kurse')->with('myinputs', $kurse);

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
