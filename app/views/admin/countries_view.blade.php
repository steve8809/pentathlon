@extends('admin/layout')

@section('content')

    {{ Form::open(array('url' => '/competitor')) }}
        {{ Form::label('name', 'Versenyző neve:') }}
        {{ Form::text('name') }}
        {{ Form::label('countries_id', 'Ország:') }}
        {{ Form::select('countries_id',$countries); }}
        {{ Form::submit('Mentés') }}
        {{ Form::reset('Visszaállítás') }}
    {{ Form::close() }}
@stop
