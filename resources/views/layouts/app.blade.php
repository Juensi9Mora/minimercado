<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo', 'Minimercado')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header>
    {{-- navbar --}}
{{--    @include('partials.navigation')--}}
    @include('layouts.navbar')
</header>
<main>
    {{-- Título Cabecera --}}
    <div class="bg-base-300 my-4 text-center">
        <h1 class="text-lg font-semibold m-4 uppercase">@yield('cabecera')</h1>
    </div>
    {{-- Mensajes informativos --}}
    @if (session('info'))
        <div class="flex justify-end m-4">
            <div class="alert alert-info w-96">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{session('info')}}</span>
            </div>
        </div>
    @endif
    {{-- Contenido --}}
    @yield('contenido')
</main>
<footer class="footer footer-center p-4 bg-base-300 text-base-content mt-12">
    @include('layouts.footer')
</footer>
</body>
</html>
