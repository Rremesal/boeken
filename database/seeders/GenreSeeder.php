<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\GenreBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::factory(5)->create();

        $author = Author::create([
            'name' => 'Ayn Rand',
            'description' => fake()->text(40),
        ]);

        $book = Book::create([
            'isbn' => 'randomisbn',
            'title' => 'Pines',
            'description' => 'a book',
            'pages_amount' => 40,
            'author_id' => $author->id,
        ]);

        $genre = Genre::create([
            'name' => 'Thriller',
        ]);

        $genre2 = Genre::create([
            'name' => 'Fiction',
        ]);

        GenreBook::create([
            'genre_id' => $genre->id,
            'book_id' => $book->id,
        ]);

        GenreBook::create([
            'genre_id' => $genre2->id,
            'book_id' => $book->id,
        ]);




    }
}
