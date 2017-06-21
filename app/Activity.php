<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    protected $fillable = [
        'zeit','zuordnung_aufgabe','zuordnung_abgabe','was','user',
    ];
    private $zeit;
    private $zuordnung_aufgabe;
    private $zuordnung_abgabe;
    private $was;
    private $user;

    public function __construct($zeit="",$zuordnung_aufgabe=0,$zuordnung_abgabe=0,$was="",$user=0)
    {
        $this->zeit = $zeit;
        $this->zuordnung_aufgabe=$zuordnung_aufgabe;
        $this->zuordnung_abgabe=$zuordnung_abgabe;
        $this->was=$was;
        $this->user = $user;
    }
    public function getZeit()
    {
        return $this->zeit;
    }
    public function getZuordnung_aufgabe()
    {
        return $this->zuordnung_aufgabe;
    }
    public function getZuordnung_abgabe()
    {
        return $this->zuordnung_abgabe;
    }
    public function getWas()
    {
        return $this->was;
    }
    public function getUser()
    {
        return $this->user;
    }


}
