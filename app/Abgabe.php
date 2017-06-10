<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Abgabe extends Model
{
    protected $primaryKey='abgabeid';
    protected $table = 'abgabe';
    protected $fillable = [
        'abgabedatum','zustand','user','zugehoerig_zu'
    ];



}
