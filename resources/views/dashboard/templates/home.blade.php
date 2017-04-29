@extends('dashboard.main')

@section('content')
    <h1>Welcome {{Auth::user()->name}}</h1>
    <li class="active"><a href="{{http_admin('/logout')}}">Logout</a></li>
@endsection