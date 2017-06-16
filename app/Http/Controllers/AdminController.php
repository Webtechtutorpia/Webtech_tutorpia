<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Tutorpia\Http\Controllers\Controller;
use Tutorpia\User;
use Tutorpia\Belegung;
use Tutorpia\Kurse;
use View;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public $Users;

    public function index()
    {
        global $Users;
        global $kurse;

        $this->Users = User::all();
        Session::put('Users', $this->Users);
        $allekurse = Kurse::all();
        $i = 0;
        foreach ($allekurse as $kurs) {
            $belegungen = DB::table('belegung')
                ->join('users', 'users.id', '=', 'belegung.user')->select('belegung.id','belegung.rolle', 'name', 'email')
                ->where('kurs', '=', $kurs->bezeichnung)->get();
            $j = 0;
//                foreach($belegungen as $belegung) {
////                    $array=array('name'=>$belegung->name, 'email'=>$belegung->email, 'rolle'=> $belegung->rolle);
//                    $array[$j]=$belegung;
//                                      $j++;
//
//                }
            $kurse[$i] = array('kurs' => $kurs->bezeichnung, 'belegungen' => $belegungen);


            $i++;
        }
        Session::put('kurse', $kurse);
//        return response()->json($kurse);
        return view('Admin.admin')->with('Users', $this->Users)->with('kurse', $kurse);


    }

    public function store()
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function aendereUser(Request $request)
    {

        $Users = $request->session()->pull('Users');
//        $Users = Session::flash('Users', 'Änderung war erfolgreich');
        for ($i = 0; $i < sizeof($Users); $i++) {

            $user = User::find($Users[$i]->id);
                $user->rolle = $request->rolle[$i];
                    $user->save();
        }




       $request->Session()->flash('message', 'Userrollen wurden erfolgreich geändert');
        //Session::flash('success', 'Änderungen wurden übernommen');
        return back();

//         return View::make('Professor.test')->with('myinputs', $users);
    }

    public function aenderebelegung(Request $request)
    {
        $Belegungen = $request->session()->get('kurse');
   $j=0;
        foreach($Belegungen as $belegung){
            for ($i = 0; $i < sizeof($belegung['belegungen']); $i++) {
                $bel = Belegung::find($belegung['belegungen'][$i]->id);
                $bel->rolle = $request->kursrolle[$j];
                $bel->save();
                $j++;
            }
        }

            $request->Session()->flash('message', 'Kursrollen wurden erfolgreich geändert');
        return back();
        }
//        for ($i = 0; $i < sizeof($Belegungen['belegungen']); $i++) {
//
//            $Belegung = Belegung::find($Belegungen->id);
//
//            $Belegung->rolle = $request->kursrolle[$i];
//            $Belegung->save();
//        }


    public function deleteUser(Request $request){

        if($request->delete != "") {
            $users = DB::table('users')->select('id')->where('name', '=', $request->delete)->orwhere('email', $request->delete)->get();
            if($users -> isEmpty()){
                $request->Session()->flash('negativ', 'Der zu löschende User existiert nicht');
            }
            else {
                $request->Session()->flash('message', 'Users wurden erfolgreich gelöscht');
            }

            foreach ($users as $u) {
                $test = User::find($u->id)->delete();

            }
        }
        else {
            $request->Session()->flash('negativ', 'Der zu löschende User existiert nicht');
        }

    return back();
    }

    public function createKurs(Request $request){

        DB::table('kurs')->insert([
            'bezeichnung'=> $request->kursname,
            'geleitet_von' =>$request->leiter
        ]);

        DB::table('belegung')->insert([
            'user'=> $request->leiter,
            'kurs' =>$request->kursname,
            'rolle'=>'Professor'
        ]);

        $request->session()->flash('message' ,'Kurs erfolgreich angelegt');
        return back();
    }

    public function deleteKurs(Request $request){

    }
}
?>