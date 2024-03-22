<?php

namespace App\Livewire;

use App\Models\Author;
use Livewire\Component;

class AuthorOverview extends Component
{
    public string $search = '';

    public ?Author $author = null;
    public bool $isModalOpen = false;

    public function toBeDeleted(Author $author) {
        $this->author = $author;
        $this->isModalOpen = true;
    }

    public function render()
    {
        $authors = Author::where('name', 'LIKE', '%'.$this->search.'%')->where('isDeleted', false)->get();
        return view('livewire.author-overview', ['authors' => $authors]);
    }
}
