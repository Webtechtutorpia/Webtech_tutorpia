<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Tutorpia\Contact;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {

        return view('contact_confirmation');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'betreff' => 'required',
            'email' => 'required',
            'message' => 'required']);

        $check = Contact::where('name', $request->name)->where('email', $request->email)->where('subject', $request->betreff)->get();

        if ($check->isEmpty()) {

            $contact=new Contact($request->name,$request->betreff,$request->email,$request->message,false);
            $data = [
                'name' => $contact->getName(),
                'subject' => $contact->getSubject(),
                'email' => $contact->getEmail(),
                'message' => $contact->getMessage(),
                'beantwortet' => $contact->getBeantwortet()
            ];


            DB::table('contact')->insert([
                'name' => $contact->getName(),
                'subject' => $contact->getSubject(),
                'email' => $contact->getEmail(),
                'message' => $contact->getMessage(),
                'beantwortet' => $contact->getBeantwortet(),
                'created_at'=>Carbon::now()
            ]);


            Mail::send('contact', $data, function ($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to('contact.tutorpia@gmail.com', 'Tutorpia')->subject($data['subject'])
                    ->setBody('Eine Neue Kontaktanfrage ist eingegangen.<br><br>Gesendet von: ' . $data['email'] . '<br><br>' . $data['name'] . ' hat folgendes geschrieben:<br>' . $data['message']);
//  $message->to('582b290ad4-10df39@inbox.mailtrap.io', 'Tutorpia')->subject($data['subject'])->setBody('ich bin der Text');

            });

        }
        return view('contact_confirmation');


    }


}
