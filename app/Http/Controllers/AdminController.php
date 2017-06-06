<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tutorpia\Http\Controllers\Controller;
use Tutorpia\User;
use View;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $Users;

    public function index()
    {
//        global $Users;


            $this->Users = User::all();
            Session::put('Users', $this->Users);
            return view('Admin.admin')->with('Users', $this->Users);

    }

    public function store()
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function test(Request $request)
    {

        $Users= $request->session()->pull('Users');
//        $Users = Session::flash('Users', 'Änderung war erfolgreich');
        for( $i=0; $i< sizeof($Users); $i++){

         $user=User::find($Users[$i]->id);
         $user->rolle = $request->rolle[$i];
         $user->save();
        }
        $user = DB::table('users')->select('*')->get();
        //$user= DB::table('users')->select('name')->get();
        //$user=User::all();
        //var_dump($user);
//        $user->delete();


        Session::flash('success', 'Änderungen wurden übernommen');
       //return redirect('/');
         return View::make('Professor.test')->with('myinputs', $user);
    }
}

?>