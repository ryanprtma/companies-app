<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
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
        <input type="text" id="phone" name="phone" value="{{ $employee->phone }}"  required>

        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>
</body>
</html>
