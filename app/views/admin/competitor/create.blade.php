@extends('admin/competitor/layout')

@section('content')

    <div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('competitor') }}">Versenyzők</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('competitor') }}">Versenyzők listája</a></li>
            <li><a href="{{ URL::to('competitor/create') }}">Új versenyző</a>
        </ul>
    </nav>

    <h1>Versenyző létrehozása</h1>
    
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'competitor')) }}
        
        <div class="form-group">
            {{ Form::label('név', 'Név') }}
            {{ Form::text('név', Input::old('név'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('birthday', 'Születési idő') }}
            {{ Form::text('birthday', Input::old('birthday'), array('class' => 'form-control')) }}
        </div>
    
        <div class="form-group">
            {{ Form::label('country', 'Ország') }}
            {{ Form::select('country', array('' => 'Válassz országot') + $countries, Input::old('country'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('club', 'Egyesület') }}
            {{ Form::select('club', array('' => 'Válassz egyesületet') + $clubs, Input::old('club'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Versenyző létrehozása', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    </div>
@stop
