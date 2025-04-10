<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = auth()->user()->task()->orderBy("id", "desc")->paginate(10);
        // $tasks = Task::all();
        // dd("", $tasks);
        return view("viewTask", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "task_titel" => "string|max:255",
            "description" => "string|max:255",
        ]);
        Task::create([
            "task_titel" => $request->task_titel,
            "description" => $request->description,
            'user_id' => auth()->id(),
        ]);
        return back()->with('success', 'New Task Create Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if ($task->user_id != auth()->id()) {
            return redirect()->route('edit_task')->withErrors('success', 'You are not authorized to edit this task!');
        }
        return view('editTask', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        if ($task->user_id != auth()->id()) {
            return redirect()->route('edit_task')->withErrors('success', 'You are not authorized to update this task!');
        }
        return redirect()->route('task')->with('success', 'Task Update Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with('success', 'Task deleted successfully!');
    }
}
