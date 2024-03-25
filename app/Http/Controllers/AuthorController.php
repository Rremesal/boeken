<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        return view('author.index');
    }

    public function edit(Author $author) {
        return view('author.index', ['editAuthor' => $author]);
    }

    public function show(Author $author) {
        return view('author.show', ['author' => $author]);
    }

    public function destroy(Author $author) {
        $author->update(['isDeleted' => 1]);
        return redirect()->route('authors.index');
    }
}
