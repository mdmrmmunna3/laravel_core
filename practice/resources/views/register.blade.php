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
        <a href="/" class="bg-sky-500 font-medium text-white px-10 py-4 font-serif">Go To Home</a>
    </div>
    <h2 class="text-4xl text-cyan-500 text-center uppercase font-medium font-serif">Register Form</h2>

    <div>
        <form action="" method="post" enctype="multipart/form-data" class="bg-gray-900 p-10 w-1/2 mx-auto rounded-md ">
            @csrf
            <div>
                <label for="name" class="text-white text-xl">Name</label>
                <input class="w-full py-2 pl-2 my-2 rounded-sm bg-white" type="text" name="name" id="name"
                    placeholder="Enter Your Name" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-4">
                <label for="email" class="text-white text-xl">Email</label>
                <input class="w-full py-2 pl-2 my-2 rounded-sm bg-white" type="email" name="email" id="name"
                    placeholder="Enter Your Email" value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="text-white text-xl">Password</label>
                <input class="w-full py-2 pl-2 my-2 rounded-sm bg-white" type="text" name="password" id="password"
                    placeholder="Enter Your Password" value="{{ old('password') }}">
                @error('password')
                    <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
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