<script>

  function ConfirmDelete()
  {
  var x = confirm("Biztos, hogy törölni szeretnéd?");
  if (x)
    return true;
  else
    return false;
  }

</script>

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

    <h1>Versenyzők listája</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Versenyző neve</td>
                <td>Születési dátum</td>
                <td>Ország</td>
                <td>Egyesület</td>
                <td>Műveletek</td>
            </tr>
        </thead>
        <tbody>
        @foreach($competitors as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->birthday }}</td>
                <td>{{ $value->country->country }}</td>
                <td>{{ $value->club->name }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                    {{ Form::open(array('url' => 'competitor/' . $value->id, 'class' => 'pull-right', 'onsubmit' => 'return ConfirmDelete()')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Törlés', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('competitor/' . $value->id) }}">Adatok</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('competitor/' . $value->id . '/edit') }}">Szerkesztés</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>
@stop