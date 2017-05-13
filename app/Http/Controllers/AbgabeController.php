<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AbgabeController extends Controller
{

    public function readAufgaben(Request $request){

        $fach=1;
        $tabelle = DB::table('aufgabe')->join('kurs','aufgabe.kurs','=','kurs.id')->where('kurs.id',$fach)->get();
        return response()->json($tabelle);

    }
    public function readUser(Request $request)
    {


        $user = $request->input('tfsearch', '');
        $users = DB::table('users')->where('name', 'like', $user . '%')->get();
        return response()->json($users);

    }

    public function readAll(Request $request)
    {

        $user = $request->input('tfsearch', '');

        $users = DB::table('users')->join('abgabe', 'users.id', '=', 'abgabe.user')->select('users.name', 'abgabe.zustand')->where('name', 'like', $user . '%')->get();
        return response()->json($users);




    }


}