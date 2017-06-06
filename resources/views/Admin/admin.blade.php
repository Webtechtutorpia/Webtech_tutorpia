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
                            <select name= rolle[]>
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
            <input type="text" id= delete"  placeholder="Accountname oder Email">

            <label for id="create">Account anlegen</label>
            <input type="text" id="create" placeholder="Accountname oder Email">
        <input class="btn btn-primary" type="submit" value="bestätigen">
        </form>
    @endif
@endsection