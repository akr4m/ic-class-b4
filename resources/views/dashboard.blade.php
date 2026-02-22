<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div>
                    User Information:
                    <ul>
                        <li>Name: {{ Auth::user()->name }}</li>
                        <li>Email: {{ Auth::user()->email }}</li>
                        <li>Role: <string class="font-bold">{{ Auth::user()->role }}</string>
                        </li>
                    </ul>
                </div>
                @can('access-admin-panel')
                <div>
                    <a href="{{ route('admin') }}" class="text-blue-500 hover:underline">
                        {{ __('Go to Admin Dashboard') }}
                    </a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
