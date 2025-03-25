<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 20px;
        }

        #from_container {
            width: 600px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 5px;
            background-color: gainsboro;
        }

        .input_box {
            margin-bottom: 10px;
        }

        .input_box input {
            width: 100%;
            padding: 5px 5px;
        }

        .input_box textarea {
            width: 100%;
            padding: 5px 5px;
        }

        .btn {
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 18px;
            border: none;
            margin-top: 15px;
            text-transform: uppercase;
            transition: .2s all linear;
        }

        .btn:hover {
            background-color: green;
            color: white;
            transition: .2s all linear;
        }

        .titel {
            text-align: center;
            text-transform: uppercase;
            color: green;
            font-family: 'Times New Roman', Times, serif;
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
    <h2 class="titel">Update Task</h2>
    <form action="{{ route('updateTask', $task->id) }}" method="post" enctype="multipart/form-data" id="from_container">
        @csrf
        @method('PUT')
        <div class="input_box">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $task->name) }}"
                placeholder="Enter Task Name">
        </div>
        <div class="input_box">
            <label for="describ">Task Description</label>
            <textarea name="describ" id="describ" rows="6"
                placeholder="Enter description">{{ $task->describ }}</textarea>
        </div>
        <button class="btn" type="submit">Update Task</button>
    </form>
</body>

</html>