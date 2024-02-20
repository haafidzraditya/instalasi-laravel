@extends('template.master')

@section('chart')
    <h1>SELAMAT DATANG ADMIN</h1>
    <form action="{{ route('login.logout') }}" method="post">
        @csrf
        @method('POST')
        <input type="submit" value="Logout" class="btn btn-danger">
    </form>
@endsection