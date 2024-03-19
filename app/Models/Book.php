<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function shelves() {
        return $this->hasManyThrough(Shelf::class, BookShelf::class);
    }

    public function genres() {
        return $this->hasManyThrough(Genre::class, GenreBook::class);
    }
}
