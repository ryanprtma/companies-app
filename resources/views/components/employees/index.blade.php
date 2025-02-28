<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
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

        .edit-button {
            display: inline-block;
            padding: 10px 15px;
            background: #3e54fd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .edit-button:hover {
            background: #1526b7;
        }

        .delete-button {
            display: inline-block;
            padding: 10px 15px;
            background: #b90d0d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .delete-button:hover {
            background: #750f0f;
        }

        .add-button {
            display: inline-block;
            padding: 10px 15px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .add-button:hover {
            background: #218838;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            justify-content: center;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination .page-item {
            display: inline-block;
        }

        .pagination .page-link {
            text-decoration: none;
            padding: 8px 12px;
            border: 1px solid #007bff;
            color: #007bff;
            border-radius: 5px;
        }

        .pagination .page-link:hover {
            background: #007bff;
            color: white;
        }

        .pagination .active .page-link {
            background: #007bff;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Employee List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->company->name }}</td>
                <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>
                    <div>
                        <a href={{ route('edit-employee', $employee->id) }} class="edit-button">Edit</a>
                        <a href={{ route('delete-employee', $employee->id) }} class="delete-button">Delete</a>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td rowspan="4">No data</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <a href={{ route('create-employee') }} class="add-button">Add Employee</a>
        <div class="d-flex justify-content-center">
            {{ $employees->links() }}
        </div>
    </div>

    </body>
</html>
