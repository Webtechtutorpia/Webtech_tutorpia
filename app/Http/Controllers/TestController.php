<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function test(Request $request) {
        $parameters = [
            'posted'=>true,
            'aufgabenname'=>$request->input('Aufgabenname')
        ];
        return view('home',$parameters);
    }
}
