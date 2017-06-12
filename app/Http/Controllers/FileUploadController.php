<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Tutorpia\Http\Requests;
use Auth;
use Session;
use Illuminate\Support\Facades\Storage;
use Tutorpia\Abgabe;
use Illuminate\Support\Facades\DB;
use Tutorpia\Http\Controllers\Controller;

class FileUploadController extends Controller
{

    public function store(Request $request)
    {
        // Überprüfe, ob der Request die Datei "upload" enthält
        // und dieser Upload fehlerfrei abgelaufen ist
        if (request()->hasFile('upload')) {
//            if ($request->file('upload')->getMimeType() == 'application/pdf') {

            $name = $request->file('upload')->getClientOriginalName();
            $path = $request->file('upload')->storeAs('files', $request->username . '_' . $request->aufgabenname . '_' . $name);
            //$path = $request->file('avatar')->store('avatars/'.$request->user()->id, 's3');
            $pfad = 'app/files/'. $request->username . '_' . $request->aufgabenname . '_' . $name;
            DB::table('abgabe')->where('abgabeid', '=', $request->abgabeid)->update(['zustand' => '/', 'pfad'=> $pfad, 'upload_am' => date('d-m-Y H:i:s')]);
            return back();
//            }
//            else{
//                Session::flash('message', 'Bitte nur Textdateien mit Endnung .txt oder.doc hochladen');
//                return back();
//            }
        } else {
            Session::flash('message', 'Hochladen der Datei hat nicht funktioniert.Bitte erneut versuchen.');
            return back();
        }

    }

    public function delete(Request $request){

        $abgabe=Abgabe::find($request->abgabeid);
        $array= explode('/',$abgabe->pfad);
        $pruefe=Storage::exists('files/' . $array[sizeof($array)-1]);
        if($pruefe ){
            Storage::delete('files/' . $array[sizeof($array)-1]);
        }
        $abgabe->pfad =null;
        $abgabe->zustand ='.';
        $abgabe->save();

        return back();
//        return response($abgabe->pfad);
    }
    public function download(Request $request)
    {
        $abgabe=Abgabe::find($request->abgabeid);
        $path= storage_path($abgabe->pfad);
       return response()->download($path);


//        $path = storage_path('app/files/TestStudent_Aufgabe3_eule2.jpg');
//        return response()->download($path);
//        return view ('home')->with('path',$path);

    }

}
