<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Company</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f4f4f4;
        }

        .form-container {
            /*width: 350px;*/
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="file"] {
            width: 94%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Create Employee</h2>
    <form action="{{ route('store-employee') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="company-id">Pilih Perusahaan:</label>
        <select id="company-id" name="company_id">
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ ucfirst($company->name) }}</option>
            @endforeach
        </select>

        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="first_name" required>

        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" name="last_name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" required>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html><?php
