@props(['book' => null, 'authors' => []])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $book ? 'Edit: ' . $book->title : 'Create book' }}
        </h2>
    </x-slot>

    <section>
        <article>
            <main class="flex justify-center">
                <form enctype="multipart/form-data" class="flex flex-col border border-1 bg-blue-600 dark:bg-customprimary rounded-md w-96 p-4" method="POST" action="{{ $book ? route('books.update', $book) : route('books.store') }}">
                    @csrf
                    @method($book ? 'PUT' : 'POST')
                    <x-input name="title" label="Title" type="text" value="{{ $book ? old('title', $book->title) : '' }}"/>
                        @error('title')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    <x-input name="description" label="Description" type="textarea" value="{{ $book ? old('description', $book->description) : '' }}"/>
                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    <x-input name="isbn" label="ISBN" type="text" value="{{ $book ? old('isbn', $book->isbn) : '' }}"/>
                        @error('isbn')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    <x-input name="pages_amount" label="Amount of pages" type="number" min="10" value="{{ $book ? old('pages_amount', $book->pages_amount) : '' }}"/>
                        @error('pages_amount')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    <label class="text-blue-300 font-bold" for="image_path">Image</label>
                    <input class="bg-white px-3 py-2 rounded-md border border-1" type="file" name="image_path" id="image_path">
                    @error('image_path')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <label class="text-blue-300 font-bold" for="author_id">Author</label>
                    <select class="mb-2" id="author_id" name="author_id">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    <x-button>{{ $book ? 'Update' : 'Create' }}</x-button>
                </form>
            </main>
        </article>
    </section>
</x-app-layout>
