<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    @include('includes.cdn')
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('styles')
</head>
<body class="antialiased overflow-hidden">
    {{ $slot }}
    @livewireScripts
    @stack('scripts')
</body>
</html>
