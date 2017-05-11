<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Aufgabe;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;



class AufgabeController extends Controller
{
//    function validateAndSave(Request $request) {
//        $errMsg = $this->validate2($request);
//
//        $parameters = [
//            'posted'=>true,
//            'aufgabenname'=>$request->input('Aufgabenname'),
//            'datum'=>$request->input('Datum')
//        ];
//        if (!empty($errMsg)) {
//            return view('Professor.professorenmodus',$parameters);
//        } else {
//           $this->save($request);
//            return view('home',$parameters);
//        }
//
//    }
//    function validate2(Request $request)
//    {
//        $errMsg = "";
//        if (empty($request->input('Aufgabenname'))) {
//            $errMsg = $errMsg . "Das Feld Aufgabenname muss ausgefüllt sein.<BR>";
//        }
//
//        if (empty($request->input('Datum'))) {
//            $errMsg = $errMsg . "Das Feld Datum muss ausgefüllt sein.<BR>";
//        }
//
//        return $errMsg;
//    }

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
            'erstellt_von' => Auth::user()->id
        ]);
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
    public function edit($id)
    {
        // get the myinput
        $aufgabe = Aufgabe::find($id);

        // show the edit form and pass the myinput
        return View::make('Professor.Professorenmodus')
            ->with('aufgabe', $aufgabe);
    }


}
