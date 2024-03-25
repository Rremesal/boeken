@props(['editRole' => null])
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles & Permissions') }}
        </h2>
    </x-slot>

    <livewire:role-overview :role="$editRole"/>


</x-app-layout>
