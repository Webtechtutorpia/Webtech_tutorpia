<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use Tutorpia\Http\Controllers\Controller;
use Auth;
class KorrekturController extends Controller
{
    public function index(){
        $parameter= [
            'aufgabenname' => 'Aufgabe 5',
            'student' => 'Anton',
            'zustand' => '+'
        ];
        if(Auth::check()) {

            return view('Tutor.Aufgabenkorrektur', $parameter);
        }
        else return view('home');
        }
}
