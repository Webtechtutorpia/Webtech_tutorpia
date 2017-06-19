<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    protected $fillable = [
        'zeit','zuordnung_aufgabe','zuordnung_abgabe','was','user',
    ];



}
