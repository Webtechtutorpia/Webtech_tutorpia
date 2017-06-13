<?php

namespace Tutorpia\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Auth;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AufgabenansichtController extends Controller
{
    public function index()
    {

        if (Auth::check()) {


            // get all the myinputs
            $abgabe = Aufgabe::all();

            // load the view and pass the myinputs
            return View::make('Aufgabenansicht.Aufgabenansicht_example')->with('myinputs', $abgabe);
        }
        else {
            return View::make('home');
        }
    }
    public function show($kurs)
    {

            session()->put('global_variable', $kurs);

            // SELECT * FROM `abgabe`,`aufgabe`,`users` WHERE abgabe.zugehoerig_zu=aufgabe.id and aufgabe.kurs=2 and abgabe.user=users.id order by users.id
            $abgabe = DB::table('abgabe')
                ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
                ->join('users', 'abgabe.user', '=', 'users.id')
                ->select('abgabe.updated_at as abgabeupdated_at','abgabe.created_at as abgabecreated_at','abgabe.*','users.*','aufgabe.*')
                ->where('aufgabe.kurs', session()->get('global_variable'))
                ->where('users.id', Auth::user()->id)
                //->where('users.name',"TestStudent")
                ->orderBy('aufgabe.aufgabenname', 'asc')
                ->get();
            // show the view and pass the myinput to it
//              return response($abgabe);
            return View::make('Aufgabenansicht.Aufgabenansicht_example')->with('myinputs', $abgabe)->with('kurs',session()->get('global_variable'));

    }

    public function matchHTML(Request $request)
    {
        $cities=$this->queryName($request);
        return view('gesuchteAufgabe',['cities'=>$cities]);


    }


private function queryName(Request $request){
        if (isset($request->name)) {
            $prefix = $request->name;
        } else {
            $prefix = '';
        }
        if ($prefix !== '') {
            //$name = Aufgabe::where('aufgabenname','like',$prefix. '%')->get();
            $name = DB::table('abgabe')
                ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
                ->join('users', 'abgabe.user', '=', 'users.id')
                ->select('*')
                ->where('aufgabe.kurs', session()->get('global_variable'))
                ->where('users.id', Auth::user()->id)
                ->where('Aufgabe.aufgabenname','like',$prefix.'%')
                ->orderBy('users.name', 'asc')
                ->get();
        }
        return $name;

    }


    public function destroy($id)
    {
        // delete
        DB::table('abgabe')->where('abgabeid',$id)->update(['zustand'=>'.']);




        // redirect
        return back();
    }
//    public function UserAbgaben($id,$name){
//        $abgabe = DB::table('abgabe')
//            ->join('aufgabe', 'abgabe.zugehoerig_zu', '=', 'aufgabe.id')
//            ->join('users', 'abgabe.user', '=', 'users.id')
//            ->select('*')
//            ->where('aufgabe.kurs', session()->get('global_variable'))
//            ->where('users.id', $id)
//            ->where('Aufgabe.aufgabenname','like',$name)
//            ->orderBy('users.name', 'asc')
//            ->get();
//        return View::make('Aufgabenansicht.Aufgabenansicht_example')->with('myinputs', $abgabe)->with('kurs',session()->get('global_variable'));
//    }
}
