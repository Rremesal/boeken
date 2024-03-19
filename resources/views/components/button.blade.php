@props(['class' => null])
<button class="rounded-md py-1 px-3 bg-blue-500 text-white {{ $class }}">
    {{ $slot }}
</button>
