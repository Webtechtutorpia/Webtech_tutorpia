<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
class SessionController extends Controller
{
    //we will create function to get accessing session Data
    // that is with get() method
    public function getSession(Request $request){
        if($request->session()->has('session_name'))
            echo $request->session()->get('session_name');
        else {
            echo 'no data in the session';
        }
    }


// Add Formular test
    public function putSession(Request $request){
        $request->session() -> put('Aufgabenname', input('Sender-firstname'));
        $request->session() -> put ('Aufgabenstellung', input(''));
        $request->session()->put('session_name','www.hc-kr.com');
        echo 'a data hasbeen added to the session';
    }

    // create new function to delete session
    public function forgetSession(Request $request){
        $request->session()->forget('session_name');
        echo "data hasbeen removed from the session";
    }
}