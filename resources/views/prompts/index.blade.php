<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Prompts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <a href="{{ route('prompts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create New Prompt
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    {{ __("Here are all the prompts available in the system.") }}
                    <div>
                        <ul>
                            @foreach ($prompts as $prompt)
                            <li class="mb-4">
                                <h3 class="text-lg font-semibold">{{ $prompt->title }}</h3>
                                <p>{{ $prompt->content }}</p>
                                <p class="text-sm text-gray-500">Created by: {{ $prompt->user->name }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
