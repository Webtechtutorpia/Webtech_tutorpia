<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class OverviewModel extends Model
{
 private $Name;
 private $Role;
 private $Time;


    public function Constructor($Name, $Role, $Time){
    $this->Name=$Name;
    $this->Role=$Role;
    $this->Time=$Time;
    }

    public function getName(){
    return $this->Name;
    }
    public function getRole(){
    return $this->Role;
    }
    public function getTime(){
    return $this->Time;
    }

}
