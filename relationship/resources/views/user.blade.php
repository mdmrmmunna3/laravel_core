<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user info</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        tr,
        td {
            border: 1px solid gray;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>status</th>
                <th>profile bio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->profile->profile_bio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>