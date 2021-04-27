@extends('layouts.app')

@section('content')
<div class="container">
  <dl class="row">
    <dt class="col-sm-3">Cím:</dt>
    <dd class="col-sm-9  book-title">{{$book->title}}</dd>

    <dt class="col-sm-3">Kategóriák:</dt>
    <dd class="col-sm-9  book-categories">
    @foreach($book->genres as $genre)
      <span class="badge badge-{{$genre['style']}}">{{$genre['name']}}</span>
    @endforeach
    </dd>

    <dt class="col-sm-3">Oldalak száma:</dt>
    <dd class="col-sm-9  book-pages">{{$book->pages}}</dd>

    <dt class="col-sm-3">Nyelv:</dt>
    <dd class="col-sm-9  book-lang">{{$book->language_code}}</dd>

    <dt class="col-sm-3">ISBN:</dt>
    <dd class="col-sm-9  book-isbn">{{$book->isbn}}</dd>

    <dt class="col-sm-3">Raktáron:</dt>
    <dd class="col-sm-9  book-in-stock">{{$book->in_stock}}</dd>

    <dt class="col-sm-3">Állapot:</dt>
    <dd class="col-sm-9  book-borrowed">
    @if($isBorrowed>0)
      Ki van kölcsönözve.
    @else
      Nincs kikölcsönözve
    @endif
    </dd>

    <dt class="col-sm-3">Leírás:</dt>
    <dd class="col-sm-9  book-description">{{$book->description}}</dd>

    <dt class="col-sm-3">Szerzők:</dt>
    <dd class="col-sm-9  book-authors">{{$book->authors}}</dd>

    <dt class="col-sm-3">Kiadás dátuma:</dt>
    <dd class="col-sm-9  book-date">{{$book->released_at}}</dd>
  </dl>

  <div id="book-actions">
    <form action="{{$book->id}}/delete" method="DELETE">
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"></input>
      <a id="edit-book-btn" class="btn btn-primary" href="{{$book->id}}/edit">Módosítás</a>
      <button type="submit" class="btn btn-danger">Törlés</button>
      <a class="all-books-ref btn btn-secondary" href="/books">Vissza</a>
    </form>
  </div>
</div>

  </div>

  
@endsection