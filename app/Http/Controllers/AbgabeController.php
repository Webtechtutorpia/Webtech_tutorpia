<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class AbgabeController extends Controller
{
        public function readUser(Request $request){

//    $test= $request->tfsearch;

   $user= $request->input('tfsearch','');
//$test='testp';
        $users=DB::table('users')->where('name','like',$user.'%')->get();
       // $users = DB::select('select * from users where name');
        return response()-> json($users);

    }





}