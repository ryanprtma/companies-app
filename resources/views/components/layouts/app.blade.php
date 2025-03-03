<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        a {
            display: block;
            margin: 10px 0;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a:hover {
            color: #0056b3;
        }
        p {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    @if(Auth::check())
        <p>Welcome, {{ Auth::user()->name }}</p>
        <div><a href="{{ route('index-company') }}">Companies Menu</a></div>
        <div><a href="{{ route('index-employee') }}">Employees Menu</a></div>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif
</div>
</body>
</html>
