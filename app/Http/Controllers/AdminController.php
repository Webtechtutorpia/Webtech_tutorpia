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
use Carbon\Carbon;
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

            $kurse[$i] = array('kurs' => $kurs->bezeichnung, 'belegungen' => $belegungen);


            $i++;
        }
        Session::put('kurse', $kurse);
        return view('Admin.admin')->with('Users', $this->Users)->with('kurse', $kurse);


    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function aendereUser(Request $request)
    {

        $this->validate($request, [ 'rolle'=> 'required']);

        $Users = $request->session()->pull('Users');
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

        $this->validate($request, [ 'kursrolle'=> 'required']);
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



    public function deleteUser(Request $request){


        $this->validate($request, [ 'delete'=> 'required| max:255']);

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


        $this->validate($request, [ 'kursname'=> 'required| max:255', 'leiter'=> 'required']);
        $check=Kurse::where('bezeichnung',$request->kursname)->get();
        if($check->isEmpty()) {
            $kurs = new Kurse($request->kursname, $request->leiter);
            DB::table('kurs')->insert([
                'bezeichnung' => $kurs->getBezeichnung(),
                'geleitet_von' => $kurs->getGeleitet_von()
            ]);
            $belegung = new Belegung($request->leiter, $request->kursname, 'Professor');
            DB::table('belegung')->insert([
                'user' => $belegung->getUser(),
                'kurs' => $belegung->getKurs(),
                'rolle' => $belegung->getRolle(),
                'created_at' => Carbon::now()
            ]);

            $request->session()->flash('message', 'Kurs erfolgreich angelegt');
        }
        return back();
    }

    public function deleteKurs(Request $request){

    }
}
?>