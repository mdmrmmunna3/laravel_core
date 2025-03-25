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
        // retrive all task 
        // $tasks = Task::all();
        // return view("display_task", compact("tasks"));

        // retrive created user task
        // dd(auth()->user());

        // Continue with retrieving tasks
        $tasks = auth()->user()->task()->orderBy("id", "desc")->paginate(10);


        return view("display_task", compact("tasks"));
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
            'name' => 'required|string|max:255',
            'describ' => 'nullable|string',
        ]);

        Task::create([
            'name' => $request->name,
            'describ' => $request->describ,
            'user_id' => auth()->id(),
        ]);
        \Log::info('Session Data:', ['session' => session()->all()]);


        return redirect()->back()->with('success', 'Task Created Successfully!');
        // return redirect()->route('task')->with('success', 'Task Created Successfully!');
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
        if ($task->user_id !== auth()->id()) {
            return redirect()->route('task')->with('error', 'You are not authorized to edit this task.');
        }

        return view('edit_task', compact('task'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        if ($task->user_id !== auth()->id()) {
            return redirect()->route('task')->with('error', 'You are not authorized to update this task.');
        }
        return redirect()->route('task')->with('success', 'Update task successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return redirect()->route('task')->with('error', 'You are not authorized to delete this task.');
        }

        $task->delete();
        return redirect()->route('task')->with('success', 'Task deleted successfully!');
    }

}
