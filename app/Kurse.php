<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Kurse extends Model
{

    protected $table = 'kurs';
    protected $fillable = [
        'bezeichnung','geleitet_von'
    ];



}
