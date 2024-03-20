<article class="flex flex-col items-center">
    <main>
        <div class="flex justify-between my-2">
            <input class="rounded-md" placeholder="Search... (Title)" wire:model.live="search" type="text">
            <x-button><a href="{{ route('books.create') }}"><i class="fa-solid fa-plus"></i> Create new
                    book</a></x-button>
        </div>
        @if (count($books) === 0)
            <p class=" dark:text-white text-center">No books found</p>
        @else
            <table class="border-collapse border dark:border-gray-500 border-blue-600">
                <thead class="dark:bg-customprimary bg-blue-600 text-white">
                    <tr>
                        <th class="hidden md:block">ISBN</th>
                        <th>Title</th>
                        <th class="hidden md:block">Description</th>
                        <th>Pages</th>
                        <th>Genre</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody class="dark:text-white">
                    @foreach ($books as $book)
                        <tr class="bg-white dark:even:bg-customsecondary dark:bg-[#2a3d5e]">
                            <td class="hidden md:block md:border-0 py-3 px-2">{{ $book->isbn }}</td>
                            <td class="py-3 px-2">{{ $book->title }}</td>
                            <td class=" hidden md:block md:border-0 py-3 px-2">{{ $book->description }}</td>
                            <td class="py-3 px-2">{{ $book->pages_amount }}</td>
                            <td class="py-3 px-2">
                                {{ $book->genres->pluck('name')->implode(', ') }}
                            </td>
                            <td class="flex text-white gap-2 py-3 px-2">
                                <a href="{{ route('books.edit', $book) }}"
                                    class="h-10 w-10 flex justify-center items-center rounded-md hover:bg-orange-300 cursor-pointer bg-orange-500"><i
                                        class=" fa-solid fa-pen-to-square"></i></a>
                                <form method="POST" action="{{ route('books.destroy', $book) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="h-10 w-10 bg-red-500 hover:bg-red-300 rounded-md cursor-pointer"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
        @endif

        </tbody>
        </table>
    </main>
</article>
