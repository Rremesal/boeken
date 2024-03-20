<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function books() {
        return $this->hasManyThrough(Book::class, GenreBook::class, 'genre_id', 'id', 'id', 'book_id');
    }
}
