<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Belegung extends Model
{
    protected $table = 'belegung';
    protected $fillable = [
        'user', 'kurs', 'rolle'
    ];

    private $user;
    private $kurs;
    private $rolle;

    public function __construct($user =0,$kurs="",$rolle="")
    {
        $this->kurs = $kurs;
        $this->user=$user;
        $this->rolle=$rolle;
    }

    public function getKurs()
    {
        return $this->kurs;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function getRolle()
    {
        return $this->rolle;
    }
}
