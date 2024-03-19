<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookShelf extends Model
{
    use HasFactory;

    public function book() {
        return $this->belongsTo(Shelf::class);
    }

    public function shelf() {
        return $this->belongsTo(Book::class);
    }

}
