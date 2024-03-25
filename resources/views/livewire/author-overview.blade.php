<div class="px-3 mt-3 col-span-2">
    <section>
        <article>
            <main class="mb-3">
                <input class="rounded-md" placeholder="Search... (Author)" wire:model.live="search" type="text">
            </main>
        </article>
        @foreach ($authors as $author)
            <article class="  flex border-t-2 py-3">
                <header>
                    <div class="w-32 h-32 overflow-hidden rounded-full" style="background-image: url('{{ $author->profile_pic_path ? Storage::url($author->profile_pic_path) : Storage::url('/images/nopic.png') }}'); background-size: cover; background-position: center;">
                    </div>
                </header>
                <main class="w-full ml-12 md:grid-cols-[1fr_auto] md:grid-rows-2">
                    <span class="text-xl font-bold dark:text-white h-fit">
                        {{ $author->name }}
                    </span>
                    <p class=" col-start-1 dark:text-white md:w-2/3 md:h-2/3">
                        {{ Str::length($author->description) > 50 ? Str::substr($author->description, 0, 200).'...' : $author->description }}
                    </p>
                    <div class="flex justify-end items-end">
                        <div class="flex justify-around gap-5">
                            <a class="dark:text-white text-blue-400 hover:underline" href="{{ route('authors.edit', $author) }}">Edit</a>
                            <form class=" col-start-2 row-start-1" method="POST" action="{{ route('authors.destroy', $author) }}">
                                @csrf
                                @method('DELETE')
                                <button class=" text-red-500 hover:underline col-start-2 row-start-2" type="submit" >Delete</button>
                            </form>
                            <a href="{{ route('authors.show', $author) }}"
                                class=" dark:text-white text-blue-400 hover:underline col-start-2 row-start-2 w-full text-end">Read more...</a>
                        </div>
                    </div>

                </main>
            </article>
        @endforeach
    </section>
</div>
