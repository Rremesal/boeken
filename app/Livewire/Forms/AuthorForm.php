<?php

namespace App\Livewire\Forms;

use App\Models\Author;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AuthorForm extends Form
{
    public ?Author $author = null;

    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $description = '';

    #[Validate('image|extensions:jpg,png')]
    public $profile_pic_path;

    public function set(Author $author) {
        $this->name = $author->name;
        $this->description = $author->description;
        $this->profile_pic_path = $author->profile_pic_path;
        $this->author = $author;
    }

    public function save() {
        if(!$this->author) {
            $this->store();
        } else {
            $this->update();
        }
    }

    private function store() {
        $data = $this->validate();

        $file = $data['profile_pic_path'];

        $path = Storage::putFileAs('public/images/authors', $file,  $data['name'].'.'.$file->extension());

        $data['profile_pic_path'] = $path;
        Author::create($data);

        $this->profile_pic_path = $path;

        $this->reset();
    }

    private function update() {

        $this->author->update($this->validate());

        $this->reset();
    }


}
