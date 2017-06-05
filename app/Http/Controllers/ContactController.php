<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request)
    {


//    $data=[
//            'name'=>$request->name,
//            'subject'=>$request->subject,
//            'email'=>$request->email,
//            'message'=> $request->message
//        ];

        return view('contact_confirmation');
    }


    public function store(Request $request)
    {





            $data = [
                'name' => $request->name,
                'subject' => $request->subject,
                'email' => $request->email,
                'message' => $request->message
            ];

            Mail::send('contact', $data, function ($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to('contact.tutorpia@gmail.com', 'Tutorpia')->subject($data['subject'])
                    ->setBody('Eine Neue Kontaktanfrage ist eingegangen.<br><br>Gesendet von: ' . $data['email'] . '<br><br>' . $data['name'] . ' hat folgendes geschrieben:<br>' . $data['message']);
//  $message->to('582b290ad4-10df39@inbox.mailtrap.io', 'Tutorpia')->subject($data['subject'])->setBody('ich bin der Text');

            });
            return view('contact_confirmation');
        
    }


}
