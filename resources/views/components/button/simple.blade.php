@props(['message' => 'Click Here..', 'variant' => ''])


<div class="mx-auto w-full flex items-center justify-center py-16">
    {{ $slot }}

    @if($variant === 'primary')
    <button class="px-5 py-6 border shadow bg-blue-200 rounded-lg text-2xl font-bold text-gray-900 hover:bg-blue-300">
        {{ $message }}
    </button>
    @elseif($variant === 'secondary')
    <button class="px-5 py-6 border shadow bg-green-200 rounded-lg text-2xl font-bold text-gray-900 hover:bg-green-300">
        {{ $message }}
    </button>
    @else
    <button class="px-5 py-6 border shadow bg-gray-200 rounded-lg text-2xl font-bold text-gray-900 hover:bg-gray-300">
        {{ $message }}
    </button>
    @endif

</div>
