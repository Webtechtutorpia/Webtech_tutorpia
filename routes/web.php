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
Route::get('overview','OverviewController@showfirstActifty');
   // return view('Tutor.overview'));
Route::get('abgabe', function () {
    return view('Tutor.abgabe');
});
Route::get('kurse', function () {
    return view('Tutor.kurse');
});
Route::get('datenschutz', function () {
    return view('datenschutz');
});
Route::get('impressum', function () {
    return view('impressum');
});



Route::get('aufgabe_example', function () {
    return view('Tutor.Aufgabenansicht_example');
});



Route::get('professorenmodus', function () {
    return view('Professor.Professorenmodus',['posted'=>false]);
});




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


Route::post('professorenmodus', 'TestController@test');


