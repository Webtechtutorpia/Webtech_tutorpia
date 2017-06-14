<?php

namespace Tutorpia\Http\Middleware;

use Closure;
use Tutorpia\Belegung;
use Auth;
use View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BelegungMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$group)
    {
        if($request->user() !== NULL){
            // Auslesen der Benutzergruppen-ID aus der Benutzer-Instanz
            $userGroupId = $request->user()->id;

            // Anhand dieser ID wird die Benutzergruppe ausgelelesen
            $userGroup = DB::table('belegung')->select('*')->where('user',$userGroupId)->first();

            // Abschließend wird geprüft, ob der slug der Benutzergruppe mit dem übergebenen Parameter übereinstimmt
            if($userGroup->rolle === $group){

                // Alles ok, Nutzer darf passieren
                return $next($request);
            }
        }
        if (!Auth::check()) {
            return new Response(view('home'));
        }
        return back();

    }
}