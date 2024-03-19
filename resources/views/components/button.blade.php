@props(['class' => null])
<button class="rounded-md py-1 px-3 bg-customprimary hover:bg-gray-500 dark:bg-blue-500 dark:hover:bg-blue-300 text-white {{ $class }}">
    {{ $slot }}
</button>
