<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $rules = [
        'title' => ['required'],
        'description' => ['required'],
        'pages_amount' => ['required', 'min:10'],
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

