@extends('layouts.app')

@section('content')
<div class="container">
  <form method="PATCH" action="{{ url('/genres/update') }}">
    @csrf
    <div class="form-group">
      <label>Kategória neve:</label>
      <input name="name" class="form-control" type="text" value="{{$genre['name']}}"></input>
    </div>
    <div class="form-group">
      <label>Kategória stílusa:</label>
      <input name="style" class="form-control" type="text" value="{{$genre['style']}}"></input>
    </div>
    
    <input type="hidden" name="id" value="{{$genre['id']}}"></input>
    <button class="btn btn-primary" type="submit">Frissítés</button>
    <a id="all-books-ref" class="btn btn-secondary" href="{{ url('/books') }}">Vissza</a>
    </form>
    @if(isset($data))
  <div id="genre-created">
    <span id="genre-name">
      Műfaj sikeresen frissítve <b>{{$data['name']}}</b> néven.
    </span>
  </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  </div>

@endsection