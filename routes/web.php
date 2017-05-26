<?php

use Illuminate\Http\Request;
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


//Professorenmodus
//Route::get('leseaufgaben','AufgabeController@read');
//Route::get('createaufgabe','AufgabeController@create');
//Route::get('create', 'AufgabeController@create');
//Route::get('update', 'AufgabeController@update');






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

//
//Route:: resource('Test', function(){
//
//    return view ('Activity.overview');
////    if (user::Auth()) {
////        return view ('Activity.overview');
////    }
////    else {
////        return view('home');
////    }
//});
Route::resource('Professor','AufgabeController');
Route::resource('Activity','ActivityController');
Route::resource('Kurse','BelegungController');
//Route::resource('Aufgabenansicht','AufgabenansichtController');
Route::resource('Tutor','AbgabeController');
Route::resource('FileUpload','FileUploadController');
Route::resource('myinputs', 'MyinputController');
Route::resource('korrektur', 'KorrekturController');

Route::get('/cityDetail/{cityId}', 'AufgabenansichtController@view');

Route::get('Aufgabenansicht/ajaxcityList','AufgabenansichtController@matchHTML');



