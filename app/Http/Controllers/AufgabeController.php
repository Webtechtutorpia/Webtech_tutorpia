<?php

namespace Tutorpia\Http\Controllers;

use Tutorpia\Aufgabe;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;



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
        ]);
        return back();

    }

    public function read( Request $request) {

}


}
