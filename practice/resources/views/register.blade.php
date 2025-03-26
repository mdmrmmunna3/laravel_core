<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registration</title>
</head>

<body>
    <div class="mt-5 ms-5">
        <a href="/" class="bg-sky-500 text-white px-10 py-4 font-serif">Go To Home</a>
    </div>
    <h2 class="text-4xl text-cyan-500 text-center uppercase font-medium font-serif">Register Form</h2>

    <div>
        <form action="" method="post" enctype="multipart/form-data" class="bg-gray-900 p-10 w-1/2 mx-auto rounded-md ">
            @csrf
            <div>
                <label for="name" class="text-white text-xl">Name</label>
                <input class="w-full p-2 bg-gray-100 " type="text" name="name" id="name" placeholder="Enter your name"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 font-medium text-xs">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-4">
                <label for="email" class="text-white text-xl">Email</label>
                <input class="w-full p-2 bg-gray-100 " type="text" name="email" id="email"
                    placeholder="Enter your email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 font-medium text-xs">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="password" class="text-white text-xl">Password</label>
                <input class="w-full p-2 bg-gray-100 " type="password" name="password" id="password"
                    placeholder="Enter your password" value="{{ old('password') }}">
                @error('password')
                    <div class="text-red-500 font-medium text-xs">{{ $message }}</div>
                @enderror
            </div>
            <button
                class="bg-sky-500 hover:bg-green-500 text-xl font-medium font-serif text-white rounded-sm mt-5 w-full py-3 uppercase leading-tight"
                type="submit">Register</button>
            <p class="mt-4 text-white">You have an account? go <a class="text-sky-500"
                    href="{{ route('login') }}">Login</a>
            </p>
        </form>
    </div>
</body>

</html>