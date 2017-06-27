<?php

namespace Tutorpia;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

protected $table='contact';
    protected $fillable = [
        'name','subject', 'email', 'message',
    ];
    private $name;
    private $subject;
    private $email;
    private $message;
    private $beantwortet;

    public function __construct($name="",$subject="",$email="",$message="",$beantwortet=false)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->email = $email;
        $this->message = $message;
        $this->beantwortet = $beantwortet;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSubject()
    {
        return $this->subject;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function getBeantwortet()
    {
        return $this->beantwortet;
    }

}
