<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreBook extends Model
{
    use HasFactory;

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}
