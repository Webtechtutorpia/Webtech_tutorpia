@extends('layouts.app')
@section('content')

    @if(Auth::user()->rolle =='admin')
        <h1>Adminbereich</h1>
        <form method="post" action="{{Url ('test')}}">

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
                @foreach($Users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ $user->rolle }}</td>

                        <td>
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
            <input type="text" id=delete" name="delete" placeholder="Accountname oder Email">


            <input class="btn btn-primary" type="submit" value="bestätigen">
        </form>

        <form method="post" action="test2">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <h1>Kursbereiche</h1>
        @foreach($kurse as $kurs)

            <h3>{{$kurs['kurs']}}</h3>
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
                                </select>  </td>
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
        @endforeach
            <input type="submit" value="abschicken">
        </form>
    @endif
@endsection