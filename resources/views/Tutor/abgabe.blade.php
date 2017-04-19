@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <h2>Tutorenmodus: ALDA</h2>

            <div class="col-lg-4 col-md-offset-8">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Suche nach...">
                <span class="input-group-btn">
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </span>

            </div>
            </div>

        <table class="table table-hover" >
            <thead>
            <tr>
                <th class="col-md-3">Vorname</th>
                <th class="col-md-3">Nachname</th>
                <th class="col-md-1">Aufgabe1</th>
                <th class="col-md-1">Aufgabe2</th>
                <th class="col-md-1">Aufgabe3</th>
                <th class="col-md-1">Aufgabe4</th>
                <th class="col-md-1">Aufgabe5</th>
                <th class="col-md-1">Aufgabe6</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
            </tr>
            <tr>
                <td>Klaus</td>
                <td>Peter</td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
                <td class="text-center"><input type="checkbox" value=""></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>


    @endsection