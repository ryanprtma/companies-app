<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Company</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
        }
        .alert {
            color: #d9534f;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .form-control {
            width: 95%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        img {
            display: block;
            margin: 10px auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Company</h2>

    @if ($errors->any())
        <div class="alert">
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

        <div>
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $company->email }}" required>
        </div>

        <div>
            <label>Current Logo:</label><br>
            @if($company->logo_directory)
                <img src="{{ asset('storage/' . $company->logo_directory) }}" alt="Company Logo" width="150">
            @else
                <p>No logo uploaded</p>
            @endif
        </div>

        <div>
            <label>Upload New Logo:</label>
            <input type="file" id="logo" name="logo" class="form-control">
        </div>

        <button type="submit">Update Company</button>
    </form>
</div>
</body>
</html>
