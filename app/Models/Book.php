<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_path', 'isbn', 'pages_amount', 'author_id'];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function shelves() {
        return $this->hasManyThrough(Shelf::class, BookShelf::class);
    }

    public function genres() {
        return $this->hasManyThrough(Genre::class, GenreBook::class, 'book_id', 'id', 'id', 'genre_id');
    }
}
