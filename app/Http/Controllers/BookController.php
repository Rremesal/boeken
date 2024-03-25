<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
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
        'author_id' => ['required']
    ];

    public function index() {
        $books = Book::all();

        return view('book.index', ['books' => $books]);
    }

    public function create() {
        $authors = Author::all();

        return view('book.create', ['authors' => $authors]);
    }

    public function store() {
        $data = request()->validate($this->rules);
        $file = request()->file('image_path');


        $path = Storage::putFileAs('public/images/books', $file,  $data['title'].'.'.$file->extension());

        $data['image_path'] = $path;

        Book::create($data);

        return redirect()->route('books.index');
    }

    public function edit(Book $book) {
        $authors = Author::all();

        return view('book.create', ['book' => $book, 'authors' => $authors]);
    }

    public function update(Book $book) {
        $data = request()->validate($this->rules);

        $book->update($data);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book) {
        $book->delete();

        return redirect()->route('books.index');
    }
}

