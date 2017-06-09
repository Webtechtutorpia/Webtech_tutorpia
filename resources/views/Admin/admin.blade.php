@extends('layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/admin.js') }}"></script>
    <script> $(document).ready(function () {
            $("li[name='Admin']").css('background-color', '#f5f8fa');
        });</script>
    @if( Session::has('message'))
        <p class="bg-success"> {{session()->pull('message')}}</p>
    @endif
    @if(Auth::user()->rolle =='admin')
        <h1>Adminbereich</h1>

        <div class="panel panel-success">
            <div class="panel-heading panel" onclick="Bodyhandler(this)"> Adminbereich</div>
            <div class="panel-body notVisible">
                <form method="post" action="{{Url ('test')}}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <table>
                        <thead>
                        <tr>
                            <th class="col-md-4">User</th>
                            <th class="col-md-4">Email</th>
                            <th class="col-md-2">aktuelle Rolle</th>
                            <th class="col-md-2"> Rolle ändern</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Users as $user)
                            <tr>
                                <td class="col-md-4">{{$user->name}}</td>
                                <td class="col-md-4">{{$user->email}}</td>
                                <td class="col-md-2">{{ $user->rolle }}</td>

                                <td class="col-md-2">
                                    @if($user->rolle=='admin')
                                        <select name=rolle[]>
                                            <option value="admin" selected>Admin</option>
                                            <option value="member">Member</option>
                                        </select>
                                    @else
                                        <select name="rolle[]">
                                            <option value="admin">Admin</option>
                                            <option value="member" selected>Member</option>
                                        </select>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <label for=delete">Account löschen</label>
                    <input type="text" id=delete" name="delete" placeholder="Accountname oder Email eingeben">


                    <input class="btn btn-primary" type="submit" value="bestätigen">
                </form>
            </div>
        </div>
        <h1>Kursbereich</h1>
        <h3>Kurs anlegen</h3>
            <form class="form-inline" method="post" action="kursanlegen">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div>
                        <div class="form-group">
                            <label for="kursname">Kursname </label>
                        <input type="text" class="form-control" id="kursname" name="kursname" placeholder="Kursname eingeben">
                        </div>
                        <div class="form-group">
                            <label for=" id=leiter">Leitender Prof.</label>

                        <select name="leiter"  class="form-control">
                                @foreach($Users as $user)
                                    @if($user->rolle=='Professor')
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        <input type="submit" class="btn btn-primary form-control">
                        </div>
                </div>
            </form>

        @if($kurse ==null)
            <h3>Keine Kurse angelegt</h3>
        @else
            <form method="post" action="test2">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                @foreach($kurse as $kurs)
                    <div class="panel panel-success">
                        <div class="panel-heading panel" onclick="Bodyhandler(this)">{{$kurs['kurs']}}</div>
                        <div class="panel-body notVisible">
                            <table>
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>aktuelle Rolle</th>
                                    <th> Rolle ändern</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($kurs['belegungen'] as $belegung)
                                    <tr>
                                        <td> {{$belegung->name}}</td>
                                        <td> {{ $belegung->email }}</td>
                                        <td> {{$belegung ->rolle}} </td>
                                        <td>
                                            @if($belegung->rolle=='Professor')
                                                <select name="kursrolle[]">
                                                    <option value="Professor" selected>Professor</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Tutor">Tutor</option>
                                                </select></td>
                                        @elseif ($belegung->rolle =='Tutor')
                                            <select name="kursrolle[]">
                                                <option value="Professor">Professor</option>
                                                <option value="Student">Student</option>
                                                <option value="Tutor" selected>Tutor</option>
                                            </select></td>
                                        @else
                                            <select name="kursrolle[]">
                                                <option value="Professor">Professor</option>
                                                <option value="Student" selected>Student</option>
                                                <option value="Tutor">Tutor</option>
                                            </select> </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                @endforeach
                <input type="submit" value="abschicken">
            </form>
        @endif
    @endif
@endsection