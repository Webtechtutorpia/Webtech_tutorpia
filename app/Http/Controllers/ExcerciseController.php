<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use Tutorpia\Http\Controllers\Controller;

class ExcerciseController extends Controller
{

    public function test(Request $request)
    {

        return view('welcome');

    }
}
