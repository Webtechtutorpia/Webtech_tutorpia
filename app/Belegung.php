<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Belegung extends Model
{
    protected $table = 'belegung';
    protected $fillable = [
        'user','kurs'
    ];
}
