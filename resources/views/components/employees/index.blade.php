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
        .edit-button, .delete-button, .add-button {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 5px;
        }
        .edit-button { background: #3e54fd; }
        .edit-button:hover { background: #1526b7; }
        .delete-button { background: #b90d0d; }
        .delete-button:hover { background: #750f0f; }
        .add-button { background: #28a745; }
        .add-button:hover { background: #218838; }
    </style>
    <script>
        function confirmDelete(event, url) {
            event.preventDefault();
            if (confirm("Are you sure you want to delete this employee?")) {
                window.location.href = url;
            }
        }
    </script>
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
                        <a href={{ route('delete-employee', $employee->id) }} class="delete-button" onclick="confirmDelete(event, '{{ route('delete-employee', $employee->id) }}')">Delete</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No data available</td>
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
