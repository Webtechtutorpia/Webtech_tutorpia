<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    protected $fillable = [
        'abgabedatum','aufgabenname','bearbeitet_von','zuordnung_aufgabe','zuordnung_abgabe','user'
    ];



}
