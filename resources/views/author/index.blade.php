@props(['editAuthor' => null])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>
    <section class=" w-full md:grid md:grid-cols-3 flex flex-col">
        <livewire:create-author :author="$editAuthor"/>
        <livewire:author-overview/>
    </section>
</x-app-layout>
