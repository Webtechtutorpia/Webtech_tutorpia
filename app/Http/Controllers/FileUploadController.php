<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use Tutorpia\Aufgabe;
use View;
use Tutorpia\Http\Requests;
use Auth;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class FileUploadController extends Controller
{
    public function index()
    {


        // load the view and pass the myinputs
        return View::make('FileUpload.FileUpload');

    }
    public function store(Request $request) {
        // Überprüfe, ob der Request die Datei "upload" enthält
        // und dieser Upload fehlerfrei abgelaufen ist
        if ($request->hasFile('upload') && $request->file('upload')->isValid()) {
            // Überprüfe, ob die hochgeladene Datei den MIME Typ PDF hat
            if ($request->file('upload')->getMimeType() == 'application/pdf') {
                // Verschiebe die Datei an den angegebenen Ort und gib ihr den angegebenen Namen
                $request->file('upload')->move('/documents', 'NeuerName.pdf');
            }
        }
    }

}
