@extends('admin/competitor/layout')

@section('content')

    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('competitor') }}">Versenyzők</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('competitor') }}">Versenyzők listázása</a></li>
            <li><a href="{{ URL::to('competitor/create') }}">Új versenyző</a>
        </ul>
    </nav>

    <h1>{{ $competitor->name }} adatai</h1>
        <div class="jumbotron text-center">
            <h2>{{ $competitor->name }}</h2>
            <p>
                <strong>Születési idő:</strong> {{ $competitor->birthday }}<br>
                <strong>Ország:</strong> {{ $competitor->country->country }}<br>
                <strong>Egyesület:</strong> {{ $competitor->club->name }}
            </p>
        </div>
    </div>

    </div>
@stop