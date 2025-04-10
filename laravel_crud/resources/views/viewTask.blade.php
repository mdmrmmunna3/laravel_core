@extends('home')
@section('title', 'Task')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-300 bg-white">
        @if ($tasks->isEmpty())
            <p class="text-center text-red-700 text-xl font-medium font-serif">No Task Found</p>
        @else
            <table class="table-auto w-full text-gray-500 text-sm">
                <thead>
                    <tr class="text-white bg-blue-500 uppercase font-serif leading-3 ">
                        <th class="px-6 py-3 text-center border">Serial No</th>
                        <th class="px-6 py-3 text-center border">Task Titel</th>
                        <th class="px-6 py-3 text-center border">Descrption</th>
                        <th class="px-6 py-3 text-center border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $index => $task)
                        <tr class="border-b hover:bg-gray-300">
                            <td class="text-center px-5 py-2 text-xl text-black">{{ $index + 1 }}</td>
                            <td class="text-center px-5 py-2 text-xl text-black">{{ $task->task_titel }}</td>
                            <td class="text-center px-5 py-2 text-xl text-black">{{ $task->description }}</td>
                            <td class="px-5 py-2 text-center">
                                <a href="{{ route('editTask', $task->id) }}"
                                    class="btn btn-primary text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-md mr-2">Edit</a>
                                <form action="{{ route('deleteTask', $task->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-danger text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md border-none">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection