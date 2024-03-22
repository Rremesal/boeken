<?php

namespace App\Livewire;

use App\Livewire\Forms\AuthorForm;
use App\Models\Author;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAuthor extends Component
{
    use WithFileUploads;

    public AuthorForm $form;

    public ?Author $author = null;

    public function mount($author) {
        if(!$author) return;
        $this->form->set($author);
    }

    public function save() {
        $this->form->save();

        return redirect('/authors');
    }



    public function render()
    {
        return view('livewire.create-author');
    }
}
