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


    <h1>{{ $competitor->name }} szerkesztése</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($competitor, array('route' => array('competitor.update', $competitor->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('név', 'Név') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('birthday', 'Születési idő') }}
            {{ Form::text('birthday', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('country', 'Ország') }}
            {{ Form::select('country_id', array('' => 'Válassz országot') + $countries, null, array('class' => 'form-control')) }}
        </div>
    
        <div class="form-group">
            {{ Form::label('club', 'Egyesület') }}
            {{ Form::select('club_id', array('' => 'Válassz egyesületet') + $clubs , null, array('class' => 'form-control')) }}
        </div>
    
        {{ Form::submit('Versenyző módosítása', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    </div>
@stop
