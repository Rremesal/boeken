<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookTable extends Component
{
    public string $search = '';

    public function render()
    {
        $books = Book::where('title', 'LIKE', '%'.$this->search.'%')->get();

        return view('livewire.book-table', ['books' => $books]);
    }
}
