@extends('home') <!-- Assuming 'tasks' is the layout you're extending -->
@section('title', 'task') <!-- Corrected the 'titel' to 'title' -->

@section('content')
    <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-300 bg-white">
        @if ($tasks->isEmpty())
            <p class="text-red-500 font-medium text-2xl text-center py-4">No Tasks Found</p>
        @else
            <table class="table-auto w-full text-sm text-gray-700">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-6 py-3 text-left">Serial No</th>
                        <th class="px-6 py-3 text-left">Task Name</th>
                        <th class="px-6 py-3 text-left">Description</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $index => $task)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $task->name }}</td>
                            <td class="px-6 py-4">{{ $task->description }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('editTask', $task->id) }}"
                                    class="btn btn-primary text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-md mr-2">Edit</a>
                                <form action="{{ route('deleteTask', $task->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-danger text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection