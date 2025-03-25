<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Task</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .titel {
            text-align: center;
            font-size: 30px;
            color: #4CAF50;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .not_found {
            text-align: center;
            font-size: 18px;
            color: #d9534f;
        }

        table {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* overflow: hidden; */
            margin-top: 20px;
        }

        th {
            background-color: green !important;
            color: white;
            border-bottom: none;
            font-weight: bold;
            text-align: center;
        }

        td {
            font-size: 16px;
            padding: 12px;
            color: #555;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .btn {
            margin-right: 10px;
            font-size: 14px;
            padding: 5px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        .btn-info {
            background-color: #5bc0de;
        }

        .btn-danger {
            background-color: #d9534f;
        }

        .btn-info:hover {
            background-color: #31b0d5;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        .task {
            background-color: #31b0d5;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }

        .task:hover {
            color: white;
        }
    </style>
</head>

<body>
    <h2 class="titel">Show All Tasks</h2>
    <a class="task" href="dashboard">Create Task</a>
    @if($tasks->isEmpty())
        <p class="not_found">No tasks found.</p>
    @else
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $index => $task)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->describ }}</td>
                            <td>{{ $task->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('editTask', $task->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('deleteTask', $task->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Are You sure you want to delete this task?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</body>

</html>