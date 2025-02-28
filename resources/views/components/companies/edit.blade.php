<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Company</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Company</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update-company', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $company->email }}" required>
        </div>

        <div class="mb-3">
            <label>Current Logo:</label><br>
            @if($company->logo_directory)
                <img src="{{ asset('storage/' . $company->logo_directory) }}" alt="Company Logo" width="150">
            @else
                <p>No logo uploaded</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Upload New Logo:</label>
            <input type="file" name="logo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Company</button>
    </form>
</div>
</body>
</html>
