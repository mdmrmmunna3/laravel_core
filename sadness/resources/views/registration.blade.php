<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <style>
        #from_container {
            width: 600px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 5px;
            background-color: gainsboro;
        }

        .input_box input {
            width: 100%;
            padding: 5px 0;
        }

        .input_box select {
            width: 100%;
            padding: 5px 0;
        }

        .titel {
            text-align: center;
            font-size: 25px;
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

        .errors {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <h2 class="titel">Registration form</h2>
    <form method="post" enctype="multipart/form-data" id="from_container">
        @csrf
        <div class="input_box">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <div class="errors">{{ $message }}</div>
            @enderror
        </div>
        <div class="input_box">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="errors">{{ $message }}</div>
            @enderror
        </div>
        <div class="input_box">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="{{ old('password') }}">
            @error('password')
                <div class="errors">{{ $message }}</div>
            @enderror
        </div>
        <div class="input_box">
            <label for="status">Status</label>
            <select name="status" id="status" value="{{ old('status') }}">
                <option value="" selected>Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            @error('status')
                <div class="errors">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn" type="submit">Register</button>
        <p> You haven't an account? <a href="{{ route('login') }}">Login</a></p>
    </form>
</body>

</html>