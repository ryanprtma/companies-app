<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 95%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .alert {
            padding: 10px;
            background: #ffdddd;
            border-left: 5px solid #d9534f;
            margin-bottom: 15px;
            color: #721c24;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Employee</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update-employee', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="first_name" value="{{ $employee->first_name }}" required>

        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" name="last_name" value="{{ $employee->last_name }}" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $employee->email }}" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ $employee->phone }}" required>

        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>
</body>
</html>
