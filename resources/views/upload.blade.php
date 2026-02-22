<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="mx-12 my-2">
    <!-- @if(session('success'))
    <div class="mb-4 p-4 text-green-700 bg-green-100 rounded">
        {{ session('success') }}
    </div>
    @endif -->

    @if(session('success'))
    <div class="mb-4 p-4 text-green-700 bg-green-100 rounded">
        <img src="{{ session('success') }}" alt="Uploaded File" class="mt-2 max-w-xs" />
    </div>
    @endif

    <img src="{{ Storage::disk('public')->url('abc.png') }}" alt="Uploaded File" class="mt-2 max-w-xs" />

    <a href="{{ route('file.download', ['file' => 'xyz.txt']) }}" class="text-blue-500 underline">
        Download File
    </a>

    <div class="border-b py-2">
        File Upload Form
    </div>

    <form action="{{ route('upload.submit') }}" method="POST" class="max-w-lg mt-4" enctype="multipart/form-data">
        @csrf
        <input name="file" type="file" />
        @error('file')
        <div class="text-red-500">
            {{ $message }}
        </div>
        @enderror
        <div>
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Upload</button>
        </div>
    </form>
</body>

</html>
