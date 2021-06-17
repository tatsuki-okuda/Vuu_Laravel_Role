<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Models\Task;


class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Task/Index', ['tasks' => Task::all() ]);
    }

    public function show(Task $task)
    {
        return Inertia::render('Task/Show', ['task' => $task]);
    }

    public function create()
    {
        return Inertia::render('Task/Create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'title' => ['required'],
            'content' => ['required'],
            'person_in_charge' => ['required']
        ])->validateWithBag('blogCreate');

        Task::create($input);

        return Redirect::route('task.index' );
    }

    public function edit(Task $task)
    {
        return Inertia::render('Task/Edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $input = $request->all();

        Validator::make($input, [
            'title' => ['required'],
            'content' => ['required'],
            'person_in_charge' => ['required']
        ])->validateWithBag('taskUpdate');

    
        $task->update($input);
    
        return Redirect::route('task.show', $task->id );
    }


    public function destroy(Task $task)
    {
        $task->delete();

        return Redirect::route('task.index');
    }

}
