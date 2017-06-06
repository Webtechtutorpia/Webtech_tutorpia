<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Tutorpia\User;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('hilfe', function () {
    return view('hilfe');
});
Route::get('contact', function () {
    return view('contact');
});
//Route::get('overview','OverviewController@showfirstActifty');
   // return view('Tutor.overview'));
Route::get('abgabe', function () {
    return view('Tutor.abgabe');
});
//Route::get('kurse', function () {
//    return view('Tutor.kurse');
//});
Route::get('datenschutz', function () {
    return view('datenschutz');
});
Route::get('impressum', function () {
    return view('impressum');
});



//Route::get('aufgabe_example', function () {
//    return view('Aufgabenansicht.Aufgabenansicht_example');
//});

Route::get('Jannis', function(){

 //   return response()->json(['key' => User::find(1)]);
  // return User::find(1)
    $parameter  = User::find(1);
    return view('home')->with(['user' => User::find(2),
        'userb' => $parameter
    ]);
});


//Abgabe
Route::get('search','AbgabeController@readUser');
Route::get('json', 'AbgabeController@readUser');
Route::get('testen', 'AbgabeController@test');
Route::get('tabelle', 'AbgabeController@readAufgaben');
Route::get('readuser','AbgabeController@readAll');






Route::get('images/{filename}', function ($filename)
{
    $path = storage_path() . '/Images/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::get('Tutor/Aufgabenkorrektur','KorrekturController@index');
Route::resource('Professor','AufgabeController');
Route::resource('Activity','ActivityController');
Route::resource('Kurse','BelegungController');
Route::get('Aufgabenansicht/ajaxcityList','AufgabenansichtController@matchHTML');
Route::get('Aufgabenansicht/bestimmteAbgabe/{id}/{name}','KorrekturController@UserAbgaben');
Route::resource('Tutor/Aufgabenkorrektur','KorrekturController');
Route::resource('Aufgabenansicht','AufgabenansichtController');
Route::resource('Tutor','AbgabeController');

Route::resource('FileUpload','FileUploadController');
Route::resource('myinputs', 'MyinputController');
Route::resource('korrektur', 'KorrekturController');
Route::resource('contactconfirmation','ContactController');
Route::resource('admin', 'AdminController');
Route::post('test','AdminController@test');

//Route::get('Aufgabenansicht/destroy/{id}','AufgabenansichtController@destroy');

//Route::get('Aufgabenansicht/{kurs}','AufgabenansichtController@show');

//Route::get('/email', function(Request $request){
//
//    $data=['bodymessage'=>'Ich bin die Nachrichtd'
//    ];
//    Mail::send('contacts',$data, function($message) use ($data){
//        $message->from('mail-z@gmx.de','Anton maier');
//        $message->to('contacts.tutorpia@gmail.com', 'Tutorpia-Team')->subject('Welcome');
//        $message->subject('Ich bin die Nachricht');
//
//    });
//});

