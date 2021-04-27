@extends('layouts.app')

@section('content')
<div class="container">
  <form method="POST" action="{{ url('/genres/store') }}">
    @csrf
    <div class="form-group">
      <label>Kategória neve:</label>
      <input name="name" class="form-control" type="text"></input>
    </div>
    <div class="form-group">
      <label>Kategória stílusa:</label>
      <input name="style" class="form-control" type="text"></input>
    </div>
    
    <button class="btn btn-primary" type="submit">Frissítés</button>
    <a id="all-books-ref" class="btn btn-secondary" href="{{ url('/books') }}">Vissza</a>
  </form>
  @if(isset($data))
  <div id="genre-created">
    <span id="genre-name">
      Műfaj sikeresen létrehozva <b>{{$data['name']}}</b> néven.
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