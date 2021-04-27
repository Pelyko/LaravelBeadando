@extends('layouts.app')

@section('content')
<div class="container">
  <form method="POST" action="{{ url('/books/store') }}">
    @csrf
    <div class="form-group">
      <label>Könyv címe:</label>
      <input class="form-control" name="title" type="text"></input>
    </div>
    <div class="form-group">
      <label>Könyv szerzői:</label>
      <input class="form-control" name="authors" type="text"></input>
    </div>
    <div class="form-group">
      <label>Kiadás dátuma:</label>
      <input class="form-control" name="released_at" type="date"></input>
    </div>
    <div class="form-group">
      <label>Oldalak száma:</label>
      <input class="form-control" name="pages" type="number"></input>
    </div>
    <div class="form-group">
      <label>ISBN:</label>
      <input class="form-control" name="isbn" type="text"></input>
    </div>
    <div class="form-group">
      <label>Leírás:</label>
      <input class="form-control" name="description" type="textarea"></input>
    </div>
    <div class="form-group">
      <label>Műfajok:</label>
      @foreach($genres as $genre)
          <div class="form-check">
            <input name="genres[]" value="{{$genre['id']}}" type="checkbox"></input>
            <label class="form-check-label"><span class="badge badge-{{$genre['style']}}">{{$genre['name']}}</span></label>
          </div>
      @endforeach
    </div>
    <div class="form-group">
      <label>Borítókép:</label>
      <input name="attachment" type="file"></input>
    </div>
    <div class="form-group">
      <label>Készleten:</label>
      <input class="form-control" name="in_stock" type="number"></input>
    </div>
    <input type="hidden" name="id"></input>
    <button class="btn btn-primary" type="submit">Létrehozás</button>
    <a class="btn btn-secondary" id="all-books-ref" href="{{ url('/books') }}">Vissza</a>
  </form>
  @if(isset($data))
  <div id="book-created">
    <span id="book-name">
      Könyv sikeresen létrehozva <b>{{$data['title']}}</b> néven.
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