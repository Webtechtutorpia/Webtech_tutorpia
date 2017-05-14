<?php

namespace Tutorpia;
use Illuminate\Database\Eloquent\Model;

class AufgabeModel extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='aufgabe';


    protected $fillable = [
        'aufgabenname','aufgabedatum', 'aufgabenbeschreibung', 'erstellt_von','kurs'
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
