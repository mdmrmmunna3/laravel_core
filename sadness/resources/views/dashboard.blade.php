<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div class="container">
        <h2>Welcome {{ auth()->user()->name }}</h2>
        <a class="task" href="task">Go Task List</a>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn" type="submit">Logout</button>
        </form>
    </div>
    <div>
        <h2 class="titel">Create Task</h2>

        <form method="post" enctype="multipart/form-data" id="from_container">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="input_box">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Task Name">
                @error('name')
                    <div class="errors">{{ $message }}</div>
                @enderror
            </div>
            <div class="input_box">
                <label for="describ">Task Description</label>
                <textarea name="describ" id="describ" rows="6" placeholder="Enter description"></textarea>
                @error('describ')
                    <div class="errors">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn" type="submit">Submit Task</button>
        </form>
    </div>
</body>


</html>