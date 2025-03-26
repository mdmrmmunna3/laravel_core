@extends('home');
@section('title', 'Display Task')

@section('content')

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

    <form method="post" enctype="multipart/form-data" class="bg-gray-900 p-10 w-1/2 mx-auto rounded-md ">
        <p class="text-center text-white text-2xl uppercase font-serif">Update Task</p>
        @csrf
        @method("PUT")
        <div class="my-4">
            <label for="name" class="text-white text-xl uppercase font-serif">Name</label>
            <input class="w-full p-2 bg-gray-800 text-white" type="text" name="name" id="name"
                placeholder="Enter your Task Name, Titel" value="{{ old('name', $task->name) }}">
        </div>
        <div>
            <label for="description" class="text-white text-xl uppercase font-serif">Desription</label>

            <textarea class="w-full p-2 bg-gray-800 text-white" rows="6" name="description" id="description"
                placeholder="Enter Your Task Description">{{ old('description', $task->description) }}</textarea>
        </div>
        <button
            class="bg-sky-500 hover:bg-green-500 text-xl font-medium font-serif text-white rounded-sm mt-5 w-full py-3 uppercase leading-tight"
            type="submit">Update Task</button>

    </form>
@endsection