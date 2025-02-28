<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
    @if(Auth::check())
        <p>Welcome, {{ Auth::user()->name }}</p>
        <div><a href={{ route('index-company') }}>Companies Menu</a></div>
        <div><a href={{ route('index-employee') }}>Employees Menu</a></div>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif
    </body>
</html>
