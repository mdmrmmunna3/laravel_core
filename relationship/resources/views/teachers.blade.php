<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border: 2px solid #ddd;
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div>
        <h3 style="text-align: center;">Laravel Crud Operation</h3>
        <a href='add/teacher'
            style="display: inline-block; margin-bottom: 10px; text-decoration: none; padding: 10px 15px; background-color: #4CAF50; color: white; border-radius: 5px;">Add
            Teacher</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Phone Number</th>
                    <th>Speciality</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($allTeachers) > 0)
                    @foreach ($allTeachers as $allTeacher)
                        <tr>
                            <!-- <td>{{ $allTeacher->id }}</td> -->
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $allTeacher->name }}</td>
                            <td>{{ $allTeacher->age }}</td>
                            <td>{{ $allTeacher->phone_number }}</td>
                            <td>{{ $allTeacher->speciality }}</td>
                            <td style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                <a href='/edit/{{ $allTeacher->id }}'
                                    style="padding: 5px 8px; background-color: blue; color: white; font-weight: 600;border-radius: 6px; text-decoration: none;">
                                    Edit
                                </a>
                                <a href='/delete/{{ $allTeacher->id }}'
                                    style="padding: 5px 8px; background-color: red; color: white; font-weight: 600;border-radius: 6px; text-decoration: none;">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" style="text-align: center;">No Teacher Found</td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
</body>

</html>