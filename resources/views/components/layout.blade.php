<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Notes App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
@session('message')
<div class="success-message">
    {{ session('message') }}
</div>
@endsession
<div>
    <a href="{{ route('note.index') }}" class="note-edit-button">Show All</a>
</div>
{{ $slot }}
</body>

</html>
