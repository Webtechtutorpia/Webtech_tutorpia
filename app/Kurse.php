<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Kurse extends Model
{

    protected $table = 'kurs';
    protected $fillable = [
        'bezeichnung','geleitet_von'
    ];

    private $bezeichnung;
    private $geleitet_von;

    public function __construct($bezeichnung="",$geleitet_von=0){
        $this->bezeichnung = $bezeichnung;
        $this->geleitet_von = $geleitet_von;
    }

    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }
    public function getGeleitet_von()
    {
        return $this->geleitet_von;
    }
}
