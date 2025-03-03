<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company List</title>
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
            width: 70%;
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .edit-button, .delete-button, .add-button {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .edit-button { background: #3e54fd; }
        .edit-button:hover { background: #1526b7; }

        .delete-button { background: #b90d0d; }
        .delete-button:hover { background: #750f0f; }

        .add-button { background: #28a745; }
        .add-button:hover { background: #218838; }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            justify-content: center;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination .page-link {
            text-decoration: none;
            padding: 8px 12px;
            border: 1px solid #007bff;
            color: #007bff;
            border-radius: 5px;
        }

        .pagination .page-link:hover, .pagination .active .page-link {
            background: #007bff;
            color: white;
        }
    </style>
    <script>
        function confirmDelete(event, url) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this company?')) {
                window.location.href = url;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h2>Company List</h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td> <img src="{{ asset('storage/' . $company->logo_directory) }}" alt="Uploaded Image" width="100"></td>
                <td>
                    <a href="{{ route('edit-company', $company->id) }}" class="edit-button">Edit</a>
                    <a href="#" onclick="confirmDelete(event, '{{ route('delete-company', $company->id) }}')" class="delete-button">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No data available</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <a href="{{ route('create-company') }}" class="add-button">Add Company</a>
    <div class="d-flex justify-content-center">
        {{ $companies->links('pagination::bootstrap-5') }}
    </div>
</div>
</body>
</html>
