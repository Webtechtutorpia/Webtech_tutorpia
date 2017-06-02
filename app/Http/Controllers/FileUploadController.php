<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Tutorpia\Http\Requests;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Tutorpia\Http\Controllers\Controller;
class FileUploadController extends Controller
{

    public function store(Request $request) {
        // Überprüfe, ob der Request die Datei "upload" enthält
        // und dieser Upload fehlerfrei abgelaufen ist
        if (request()->hasFile('upload')) {
//            if ($request->file('upload')->getMimeType() == 'application/pdf') {

                $name = $request->file('upload')->getClientOriginalName();
                $path = $request->file('upload')->storeAs('files', $request->username . '_' . $request->aufgabenname . '_' . $name);
                //$path = $request->file('avatar')->store('avatars/'.$request->user()->id, 's3');
                DB::table('abgabe')->where('abgabeid', '=', $request->abgabeid)->update(['zustand' => '/']);
                return back();
//            }
//            else{
//                Session::flash('message', 'Bitte nur Textdateien mit Endnung .txt oder.doc hochladen');
//                return back();
//            }
        }
        else{
            Session::flash('message', 'Hochladen der Datei hat nicht funktioniert.Bitte erneut versuchen.');
            return back();
        }

    }

}
