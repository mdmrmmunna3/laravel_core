<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Design</title>
</head>

<body>
    <div>
        <h3 style="text-align: center;">One to One Realationship with elquent Relationships</h3>
        <table style="width: 100%; border-collapse: collapse; margin: 20px 0; border: 2px solid #ddd;">
            <thead>
                <tr style="background-color: #4CAF50; color: white; text-align: center; border: 1px solid #ddd;">
                    <th style="padding: 12px 15px; border: 1px solid #ddd;">ID</th>
                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Name</th>
                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Age</th>
                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Phone Name</th>
                    <th style="padding: 12px 15px; border: 1px solid #ddd;">Phone Brand</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr style="text-align: center; background-color: #f2f2f2; border: 1px solid #ddd;">
                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$student->id}}</td>
                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$student->name}}</td>
                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$student->age}}</td>
                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$student->phone->name}}</td>
                        <td style="padding: 12px 15px; border: 1px solid #ddd;">{{$student->phone->brand}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>