@props([
'link' => '#',
'image' => '',
'title' => 'Placeholder',
])

<a href="{{ $link }}" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
    <span aria-hidden="true" class="absolute inset-0">
        <img src="{{ $image }}" alt="" class="size-full object-cover" />
    </span>
    <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-linear-to-t from-gray-800 opacity-50"></span>
    <span class="relative mt-auto text-center text-xl font-bold text-white">{{ $title }}</span>
</a>
