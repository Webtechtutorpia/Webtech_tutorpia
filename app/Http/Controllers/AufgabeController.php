<?php

namespace Tutorpia\Http\Controllers;


//use Tutorpia\Aufgabe;
use View;
use Illuminate\Http\Request;
use Tutorpia\Http\Requests;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Tutorpia\AufgabeModel;
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
//
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

    public function read(Request $request){

        $fach=1;
        $aufgaben= db::table('aufgabe')->join('kurs','aufgabe.kurs','=','kurs.id')->where('kurs.id',$fach)->get();
        return response()->json($aufgaben);
    }


    public function store(Request $request)
    {
        // validate

//        $this->validate($request, [
//            'aufgabenname'       => 'required',
//            'abgabedatum'      => 'required',
//            'aufgabenbeschreibung' => 'required']);

        $fach=1;

        // store
        Aufgabe::create([
            'aufgabenname'      =>  $request->aufgabenname,
          'abgabedatum'         => Carbon::now()->format('d-m-Y'),
            'aufgabenbeschreibung' =>  $request->aufgabenbeschreibung,
            'erstellt_von' => Auth::user()->id,
           'kurs'=> 1
           //'kurs'=> $request->input('kurs')
            //kurs schreibts nichtohne model

        ]);

    }

    public function create(Request $request){
        //mit Eloquent

                $this->validate($request, [
            'aufgabenname'       => 'required',
            'abgabedatum'      => 'required',
            'aufgabenbeschreibung' => 'required']);


        $aufgabe = new AufgabeModel();
        $aufgabe->aufgabenname = $request->aufgabenname;
        $aufgabe->abgabedatum = Carbon::now()->format('d-m-Y');
        $aufgabe->aufgabenbeschreibung = $request->input('aufgabenbeschreibung','');
        $aufgabe-> erstellt_von = Auth::user()->id;
        $aufgabe->kurs = $request->input('kurs','1');
        $aufgabe->save();

    }
    public function update(Request $request)
    {
//        $this->validate($request, [
//            'aufgabenname'       => 'required',
//            'abgabedatum'      => 'required',
//            'aufgabenbeschreibung' => 'required']);

        $aufgabe = AufgabeModel::find($request->id);
       $aufgabe->aufgabenname=$request->aufgabe;
       $aufgabe->save();

        return response()->json($aufgabe);


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
