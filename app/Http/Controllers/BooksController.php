<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Borrow;

class BooksController extends Controller{

  public function index(Request $request){
    $books = Book::all();
    $books = Book::paginate(9);
    $genres = Genre::all();
    $usersCount = User::count();
    $genresCount = Genre::count();
    $booksCount = Book::count();
    return view('books',[
      'books' => $books,
      'usersCount' => $usersCount,
      'genresCount' => $genresCount,
      'booksCount' => $booksCount,
      'genres' => $genres
    ]);
  }

  public function book($id){
    $book = Book::find($id);
    $isBorrowed = Borrow::all()
    ->where('book_id',$id)
    ->where('status','ACCEPTED')
    ->where('returned_at',null)
    ->count();
    return view('book',[
      'book' => $book,
      'isBorrowed' => $isBorrowed
    ]);
  }

  public function create(){
    $genres = Genre::all();
    return view('createBook',[
      'genres' => $genres
    ]);
  }


  public function store(Request $request){

    $genres = Genre::all();
    $validated = $request->validate([
      'title' => 'required|min:3|max:255',
      'authors' => 'required|min:3|max:255',
      'released_at' => 'required|date|before:today',
      'pages' => 'required|min:1',
      'isbn' => 'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
      'description' => 'nullable',
      'genres' => 'nullable',
      'attachment' => 'nullable|file|image|max:1024',
      'in_stock' => 'required|integer|min:0|max:3000'

  ]);
    $newBook = Book::create($validated);
    
    $newBook->genres()->attach($request -> genres);
    
    
    return view('createBook',[
      'data' => $validated??"",
      'genres' => $genres
      ]);
      
  }

  public function edit($id){
    $book = Book::find($id);
    $genres = Genre::all();
    return view('editBook',[
        'genres' => $genres,
        'book' => $book
    ]);
  }
  public function update(Request $request){
    $validated = $request->validate([
      'title' => 'required|min:3|max:255',
      'authors' => 'required|min:3|max:255',
      'released_at' => 'required|date|before:today',
      'pages' => 'required|min:1',
      'isbn' => 'required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i',
      'description' => 'nullable',
      'genres' => 'nullable',
      'attachment' => 'nullable|file|image|max:1024',
      'in_stock' => 'required|integer|min:0|max:3000'

  ]);
    $book = Book::where("id", $request['id']);
    $book->update([
        "title" => $validated['title'],
        "authors" => $validated['authors'],
        "released_at" => $validated['released_at'],
        "pages" => $validated['pages'],
        "isbn" => $validated['isbn'],
        "description" => $validated['description'],
        "cover_image" => $validated['attachment'],
        "in_stock" => $validated['in_stock']
    ]);
    
    $book->first()->genres()->sync($request -> genres);

    $genres = Genre::all();
    return view('editBook',[
        'data' => $book->first(),
        'book' => $request,
        'genres' => $genres
    ]);
  }

  public function bookDelete($id){
    $book = Book::find($id);
    $book->delete();
    $books = Book::all();
    $books = Book::paginate(9);
    $genres = Genre::all();
    $usersCount = User::count();
    $genresCount = Genre::count();
    $booksCount = Book::count();
    return view('books',[
        'deletedBook' => $book,
        'books' => $books,
        'usersCount' => $usersCount,
        'genresCount' => $genresCount,
        'booksCount' => $booksCount,
        'genres' => $genres
    ]);
  }

}