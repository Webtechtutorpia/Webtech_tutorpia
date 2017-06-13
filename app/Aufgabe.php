<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Aufgabe extends Model
{
    protected $table = 'aufgabe';
    protected $fillable = [
        'aufgabenname', 'abgabedatum', 'aufgabenbeschreibung', 'erstellt_von', 'kurs'
    ];

//    private $aufgabenname;
//    private $abgabedatum;
//    private $aufgabenbeschreibung;
//    private $erstellt_von;
//    private $kurs;
//
//
//    public function __construct($aufgabenname="", $abgabedatum="", $aufgabenbeschreibung="", $erstellt_von="", $kurs="")
//    {
//        $this->aufgabenname = $aufgabenname;
//        $this->abgabedatum = $abgabedatum;
//        $this->aufgabenbeschreibung = $aufgabenbeschreibung;
//        $this->erstellt_von = $erstellt_von;
//        $this->kurs = $kurs;
//
//
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getAufgabenname()
//    {
//        return $this->aufgabenname;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getAbgabedatum()
//    {
//        return $this->abgabedatum;
//    }
//
//    public function getAufgabenbeschreibung()
//    {
//        return $this->aufgabenbeschreibung;
//    }
//    public function getErstellt_von()
//    {
//        return $this->erstellt_von;
//    }
//    public function getKurs()
//    {
//        return $this->kurs;
//    }
}




