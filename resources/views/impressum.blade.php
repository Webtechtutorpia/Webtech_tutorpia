@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center"><strong>Impressum</strong></h1>
        <br><p><span style="text-decoration: underline;">Angaben gem. § 5 TMG:</span></p>


        <p>Tutorpia <br>
         Kontakt: contact.tutorpia@gmail.com</p>
        <br>
        <p><strong>Vertreten Durch:</strong></p>
        <p>Jannis Grebenstein <br>
        Rheingutstraße 34 <br>
            78462 Konstanz </p>

        <p> Isabell Bayer <br>
        Werner-Sombart-Straße 37<br>
        78464 Konstanz</p>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Impressum']").css('background-color', '#f5f8fa');
        });</script>
@endsection
