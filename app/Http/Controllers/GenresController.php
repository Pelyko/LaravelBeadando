<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\User;
use App\Models\Genre;
use App\Models\Borrow;

class GenresController extends Controller
{
    public function genre($id){
        $books = Genre::where('id',$id)->first()->books()->paginate(9);
        $genres = Genre::all();
        $genre = Genre::where('id',$id)->first();
        $usersCount = User::count();
        $genresCount = Genre::count();
        $booksCount = Book::count();
        return view('books',[
        'genre' => $genre,
        'books' => $books,
        'usersCount' => $usersCount,
        'genresCount' => $genresCount,
        'booksCount' => $booksCount,
        'genres' => $genres
        ]);
    }

    public function genreCreate(){
        return view('createGenre');
    }

    public function genreStore(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'style' => 'required|in:primary,secondary,success,danger,warning,info,light,dark'
        ]);

        $newGenre = new Genre;
        $newGenre->name = $validated['name'];
        $newGenre->style = $validated['style'];
        $newGenre->save();
        return view('createGenre',['data' => $validated]);
    }

    public function genreEdit($id){
        $genre = Genre::find($id);
        return view('editGenre',[
            'genre' => $genre
        ]);
    }

    public function genreUpdate(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'style' => 'required|in:primary,secondary,success,danger,warning,info,light,dark'
        ]);

        $genre = Genre::where("id", $request['id'])->update([
            "name" => $validated['name'],
            "style" => $validated['style']
        ]);
        return view('editGenre',[
            'genre' => $request,
        ]);
    }

    public function genreDelete($id){
        $genre = Genre::find($id);
        $genre->delete();
        $books = Book::all();
        $books = Book::paginate(9);
        $genres = Genre::all();
        $usersCount = User::count();
        $genresCount = Genre::count();
        $booksCount = Book::count();
        return view('books',[
            'deletedGenre' => $genre,
            'books' => $books,
            'usersCount' => $usersCount,
            'genresCount' => $genresCount,
            'booksCount' => $booksCount,
            'genres' => $genres
        ]);
    }
}
