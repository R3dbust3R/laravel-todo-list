<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->paginate(7);
        return view('task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->input('name');

        $request->validate([ 'name' => 'min:2|max:255' ]);
        
        if ($task->save()) {
            return redirect()->route('task.index')->with('success', 'Task added successfuly!');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated_task_name = $request->input('name');

        $task = Task::findOrFail($id);

        $task->name = $updated_task_name;
        
        if ($task->save()) {
            return redirect()->route('task.index')->with('success', 'Task updated!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $task = Task::findOrFail($id);
        if ($task->delete()) {
            return redirect()->route('task.index')->with('success', 'task deleted!');
        }

    }

    public function done(string $id) {
        
        $task = Task::findOrFail($id);
        
        if ($task->done == 1) {
            $task->done = 0;
            $msg = 'task restored!';
        } else {
            $task->done = 1;
            $msg = 'task finished!';
        }
        
        if ($task->save()) {
            return redirect()->route('task.index')->with('success', $msg);
        }



    }


}
