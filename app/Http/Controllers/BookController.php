<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\GenreBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    private $rules = [
        'title' => ['required'],
        'description' => ['required'],
        'isbn' => ['required'],
        'pages_amount' => ['required', 'min_digits:2', 'numeric'],
        'image_path' => [],
        'author_id' => ['required'],
        'genres' => []
    ];

    public function index()
    {
        $books = Book::all();

        return view('book.index', ['books' => $books]);
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view('book.create', ['authors' => $authors, 'genres' => $genres]);
    }

    public function store()
    {
        $data = request()->validate($this->rules);

        $file = request()->file('image_path');

        $path = Storage::putFileAs('public/images/books', $file,  $data['title'] . '.' . $file->extension());

        $data['image_path'] = $path;

        $book = Book::create($data);

        // check if genre was already linked
        foreach ($data['genres'] as $genre)
            GenreBook::create([
                'book_id' => $book->id,
                'genre_id' => $genre,
            ]);

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();

        foreach ($book->genres as $bookgenre) {
            foreach ($genres as $genre) {
                if ($bookgenre->id === $genre->id) {
                    $genre['set'] = true;
                    break;
                }
            }
        }

        return view('book.create', ['book' => $book, 'authors' => $authors, 'genres' => $genres]);
    }

    public function update(Book $book)
    {
        $data = request()->validate($this->rules);
        $book->update($data);

        $formGenres = request('genres');
        $dbGenres = $book->genres;
        foreach ($dbGenres as $db_genre) {
            $deleteRecord = true;
            foreach ($formGenres as $formGenre) {
                if ($db_genre->id !== intval($formGenre)) {
                    dd($formGenre);
                    GenreBook::create([
                        'genre_id' => $formGenre,
                        'book_id' => $book->id
                    ]);
                    $deleteRecord = false;
                    break;
                }
            }
            if($deleteRecord) {
                GenreBook::where('book_id', $book->id)->where('genre_id', $db_genre->id)->delete();
            }
        }

        foreach($formGenres as $formGenre) {

        }



        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
