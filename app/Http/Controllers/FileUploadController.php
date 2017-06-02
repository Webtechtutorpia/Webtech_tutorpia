<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Tutorpia\Http\Requests;
use Auth;
use Session;
use Tutorpia\Http\Controllers\Controller;
class FileUploadController extends Controller
{

    public function store(Request $request) {
        // Überprüfe, ob der Request die Datei "upload" enthält
        // und dieser Upload fehlerfrei abgelaufen ist
        if (request()->hasFile('upload')) {
            $name = $request->file('upload')->getClientOriginalName();
            $path = $request->file('upload')->storeAs('files',$request->username.'_'.$request->aufgabenname.'_'.$name);
            //$path = $request->file('avatar')->store('avatars/'.$request->user()->id, 's3');
            return back();
        }
        else{
            Session::flash('message', 'Hochladen der Datei hat nicht funktioniert.Bitte erneut versuchen.');
            return back();
        }

    }

}
