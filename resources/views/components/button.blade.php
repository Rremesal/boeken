@props(['class' => null])
<button class="rounded-md py-1 px-3 bg-blue-500 hover:bg-blue-300 text-white {{ $class }}">
    {{ $slot }}
</button>
