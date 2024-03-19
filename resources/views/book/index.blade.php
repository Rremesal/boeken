<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>
    <section>
        <article class="flex flex-col items-center">
            <main>
                <div class="flex justify-end my-2">
                    <x-button><a href="{{ route('books.create') }}"><i class="fa-solid fa-plus"></i> Create new book</a></x-button>
                </div>
                <table class="border-collapse border border-gray-500">
                    <thead class="bg-customprimary text-white">
                        <tr>
                            <th class="border border-customprimary">ISBN</th>
                            <th class="border border-customprimary">Title</th>
                            <th class=" hidden md:block md:border-0 border border-customprimary">Description</th>
                            <th class="border border-customprimary">Pages</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody class="dark:text-white">
                        @foreach ($books as $book)
                            <tr class="even:bg-customsecondary bg-[#2a3d5e]">
                                <td class="py-3 px-2 border border-customprimary">{{ $book->isbn }}</td>
                                <td class="py-3 px-2 border border-customprimary">{{ $book->title }}</td>
                                <td class=" hidden md:block md:border-0 py-3 px-2 border border-customprimary">{{ $book->description }}</td>
                                <td class="py-3 px-2 border border-customprimary">{{ $book->pages_amount }}</td>
                                <td class="flex gap-2 py-3 px-2 border border-customprimary">
                                    <a href="{{ route('books.edit', $book) }}" class="h-10 w-10 flex justify-center items-center rounded-md hover:bg-orange-300 cursor-pointer bg-orange-500"><i class=" fa-solid fa-pen-to-square"></i></a>
                                    <form method="POST" action="{{ route('books.destroy', $book) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="h-10 w-10 bg-red-500 hover:bg-red-300 rounded-md cursor-pointer"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </main>
        </article>
    </section>
</x-app-layout>