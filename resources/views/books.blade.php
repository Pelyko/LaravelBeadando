@extends('layouts.app')

@section('content')

<div class="container">
  @if(isset($deletedGenre))
    <div id="genre-deleted"><b>{{$deletedGenre['name']}}</b> sikeresen törölve.</div>
  @endif
  @if(isset($deletedBook))
    <div id="book-deleted"><b>{{$deletedBook['title']}}</b> sikeresen törölve.</div>
  @endif
  @if(isset($genre))
      <h1><span id="genre">{{$genre['name']}}</span></h1>
      <div id="genre-actions">
      <form action="{{$genre->id}}/delete" method="DELETE">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"></input>
        <a id="edit-genre-btn" class="btn btn-primary" href="{{$genre->id}}/edit">Módosítás</a>
        <button id="delete-genre-button" type="submit" class="btn btn-danger">Törlés</button>
      </div>
  @endif
  <div class="row">
    <div class="col-sm-10" id="books">
    @foreach($books as $book)
      <div class="book">
        <div class="book-title">{{$book->title}}</div>
        <div class="book-author">{{$book->author}}</div>
        <div class="book-date">{{$book->released_at}}</div>
        <div class="book-description">{{$book->description}}</div>
        <a href="/books/{{$book->id}}" class="book-details">Adatok</a>
      </div>
    @endforeach
    {{ $books->links('pagination::bootstrap-4') }} 
    </div>

    <div class="col-sm-2">
      <div class="buttons">
        <a class="create-genre-btn" href="{{ url('/genres/create') }}">Új műfaj</a>
        <a class="create-book-btn" href="{{ url('/books/create')}}">Új könyv</a>
      </div>
      
      <div class="statistics">
        <div class="stats-users">
          <span id="stats-users">Felhasználók száma: {{$usersCount}}</span>
        </div>
        <div class="stats-genres">
          <span id="stats-genres">Kategóriák száma: {{$genresCount}}</span>
        </div>
        <div class="stats-books">
          <span id="stats-books">Könyvek száma: {{$booksCount}}</span>
        </div>
      </div>

      <div class="genres-list">
      <label>Műfajok:</label><br>
      @foreach($genres as $genre)
        <a href="/genres/{{$genre['id']}}"><span class="badge badge-{{$genre['style']}}">{{$genre['name']}}</span></a><br>
      @endforeach
      </div>
    </div>
  </div>
</div> 

@endsection