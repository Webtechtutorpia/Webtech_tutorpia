<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Myinput extends Model
{
    protected $fillable = [
        'string', 'email', 'integer'
    ];
}
