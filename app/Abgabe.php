<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Abgabe extends Model
{
    protected $primaryKey='abgabeid';
    protected $table = 'abgabe';
    protected $fillable = [
        'zustand','user','zugehoerig_zu','kommentar','bearbeitet_von','pfad','upload_am','korrigiert_am'
    ];
    private $zustand;
    private $user;
    private $zugehoerig_zu;
    private $kommentar;
    private $bearbeitet_von;
    private $pfad;
    private $upload_am;
    private $korrigiert_am;

    public function __construct($zustand="",$user=0,$zugehoerig_zu=0,$kommentar="",$bearbeitet_von="",$pfad="", $upload_am="",$korrigiert_am="")
    {
        $this->zustand = $zustand;
        $this->user = $user;
        $this->zugehoerig_zu = $zugehoerig_zu;
        $this->kommentar = $kommentar;
        $this->bearbeitet_von = $bearbeitet_von;
        $this->pfad = $pfad;
        $this->upload_am = $upload_am;
        $this->korrigiert_am = $korrigiert_am;

    }

    /**
     * @return mixed
     */
    public function getZustand()
    {
        return $this->zustand;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function getZugehoerig_zu()
    {
        return $this->zugehoerig_zu;
    }
    public function getKommentar()
    {
        return $this->kommentar;
    }
    public function getBearbeitet_von()
    {
        return $this->bearbeitet_von;
    }
    public function getPfad()
    {
        return $this->pfad;
    }
    public function getUpload_am()
    {
        return $this->pfad;
    }
    public function getKorrigiert_am()
    {
        return $this->korrigiert_am;
    }





}
