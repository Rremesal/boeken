<x-app-layout>
    <section class="mx-10 mt-5">
        <header class="flex">
            <div class="grid grid-cols-1 grid-row-2">
                <div class="w-64 h-64  overflow-hidden rounded-full"
                    style="background-image: url('{{ $author->profile_pic_path ? Storage::url($author->profile_pic_path) : Storage::url('/images/nopic.png') }}'); background-size: cover; background-position: center;">
                </div>
                <span class="w-full text-center dark:text-white">{{ count($author->books) }} books written</span>
            </div>
            <div class="grid grid-cols-1 grid-rows-[auto_1fr_auto] mx-20 mt-10">
                <h2 class=" dark:text-white text-3xl font-bold">{{ $author->name }}</h2>
                <p class="dark:text-white">{{ $author->description }}</p>
            </div>
        </header>
        <main class="my-32">
            <div class=" w-4/5 {{ count($author->books) <= 2 ? 'justify-center' : ''}} mx-auto flex flex-wrap gap-4">
                @foreach ($author->books as $book)
                    <div class=" bg-white border border-1 border-gray-300 w-72 h-72 shadow-lg rounded-md">
                        <img class=" text-center w-[80%] mx-auto h-3/4 p-2" src="{{ Storage::url($book->image_path) }}" alt="No picture">
                        <span>{{ $book->genres->pluck('name')->implode(', ') }}</span>
                        <h1 class=" font-bold text-center">{{ $book->title }}</h1>
                    </div>
                @endforeach
            </div>
        </main>
    </section>
</x-app-layout>
