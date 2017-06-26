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
//brauchen wir das ?
Auth::routes();
Route::get('datenschutz', function () {
    return view('datenschutz');
});
Route::get('impressum', function () {
    return view('impressum');
});

Route::get('contact', function () {
    return view('contact');
});
Route::get('/home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('images/{filename}', function ($filename)
{
    $path = storage_path() . '/images/' . $filename;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::resource('contactconfirmation','ContactController');


Route::group(['middleware' => ['auth']], function () {


    Route::resource('Activity','ActivityController');
    Route::resource('Kurse', 'BelegungController');

    Route::get('Aufgabenansicht/ajaxAufgabenansicht','AufgabenansichtController@gesuchteAufgabe');


    Route::resource('Aufgabenansicht','AufgabenansichtController');

    Route::group(['middleware' => ['group:Tutor,Professor'] ], function(){
        Route::get('Korrektur/bestimmteAbgabe/{id}/{name}','KorrekturController@UserAbgaben');
        Route::get('json', 'AbgabeController@readUser');

        Route::get('Tutor/Aufgabenkorrektur','KorrekturController@UserAbgaben');
        Route::resource('Tutor/Aufgabenkorrektur','KorrekturController');
        Route::resource('Tutor','AbgabeController');
        Route::resource('korrektur', 'KorrekturController');

    });

     Route::group(['middleware' => 'group:Professor,""'], function(){

        Route::resource('Professor','AufgabeController');
        Route::get('reset','AufgabeController@reset');
        Route::post('confirm','AufgabeController@confirmsite');

    });



    Route::resource('FileUpload','FileUploadController');



    Route::resource('admin', 'AdminController');
    Route::post('userchanges','AdminController@aendereUser');
    Route::Post('belegungchanges', 'AdminController@aenderebelegung');
    Route::post('kursanlegen','AdminController@createKurs');
    Route::post('deleteUser','AdminController@deleteUser');



    Route::get('aktualisieren', 'ActivityController@ajax');
    Route::post('download','FileUploadController@download');
    Route::post('delete', 'FileUploadController@delete');

});


