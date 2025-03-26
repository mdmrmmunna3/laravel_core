@extends('home');
@section('title', 'Dashboard')

@section('content')


    <h2 class="text-center uppercase font-serif text-sky-500 text-4xl mb-7">Welcome To Your Dashboard
        {{ auth()->user()->name }}
    </h2>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Okay',
                timer: '1500'
            });
        </script>
    @endif

    <form action="" method="post" enctype="multipart/form-data" class="bg-gray-900 p-10 w-1/2 mx-auto rounded-md ">
        <p class="text-center text-white text-2xl uppercase font-serif">Create Task</p>
        @csrf
        <div class="my-4">
            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
            <label for="name" class="text-white text-xl uppercase font-serif">Name</label>
            <input class="w-full p-2 bg-gray-800 text-white" type="text" name="name" id="name"
                placeholder="Enter your Task Name, Titel" value="{{ old('name') }}">
            @error('name')
                <div class="text-red-500 font-medium text-xs">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description" class="text-white text-xl uppercase font-serif">Desription</label>

            <textarea class="w-full p-2 bg-gray-800 text-white" rows="6" name="description" id="description"
                placeholder="Enter Your Task Description" value="{{ old('description') }}"></textarea>
            @error('description')
                <div class="text-red-500 font-medium text-xs">{{ $message }}</div>
            @enderror
        </div>
        <button
            class="bg-sky-500 hover:bg-green-500 text-xl font-medium font-serif text-white rounded-sm mt-5 w-full py-3 uppercase leading-tight"
            type="submit">Create Task</button>

    </form>
@endsection