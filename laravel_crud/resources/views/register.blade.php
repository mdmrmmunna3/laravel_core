<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="mt-5 ms-5">
        <a href="/" class="bg-sky-500 text-white px-10 py-4 font-serif">Go To Home</a>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: {!! json_encode(session('success')) !!},
                icon: 'success',
                confirmButtonText: 'Okay',
                timer: 3000,
                timerProgressBar: true
            });

        </script>
    @endif
    <div class="mx-auto w-[600px] p-10 bg-white my-10 rounded-md shadow-lg">
        <h2 class="text-3xl font-medium text-cyan-500 text-center font-serif uppercase">Register Form</h2>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Name</label>
                <input class="w-full py-2 pl-2 my-2" type="text" name="name" id="name" placeholder="Enter Your Name"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input class="w-full py-2 pl-2 my-2" type="email" name="email" id="email" placeholder="Enter Your Email"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input class="w-full py-2 pl-2 my-2" type="text" name="password" id="password"
                    placeholder="Enter Your Password" value="{{ old('password') }}">
                @error('password')
                    <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="address">Address</label>
                <textarea name="address" id="address" value="{{ old('address') }}" class="w-full py-2 pl-2 my-2"
                    placeholder="Enter Your Address"></textarea>

                @error('address')
                    <p class="text-red-700 font-medium text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit"
                    class="bg-cyan-600 w-full text-center font-medium font-serif text-2xl text-white py-3 uppercase hover:bg-green-500 transition-all">Register</button>
            </div>
            <p class="mt-3 text-black">Are you already register? <a href="{{ route('login') }}"
                    class="text-cyan-500 text-xl">Login</a> </p>
        </form>
    </div>
</body>

</html>