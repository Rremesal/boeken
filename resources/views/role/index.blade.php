@props(['editRole' => null])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>
    <section class="grid grid-cols-[70%_30%] my-3">
        <livewire:role-overview/>
        <livewire:create-role :role="$editRole"/>
    </section>
</x-app-layout>
