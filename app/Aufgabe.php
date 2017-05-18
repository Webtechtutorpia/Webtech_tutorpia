<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Aufgabe extends Model
{
    protected $table = 'aufgabe';
    protected $fillable = [
        'aufgabenname','abgabedatum','aufgabenbeschreibung','erstellt_von','kurs'
];


}