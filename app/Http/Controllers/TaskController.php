<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;


class TaskController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        
        // $task = Task::with('user')->all()->paginate(20);
        $tasks = Task::all()->where('user_id', $id);
        return Inertia::render('Task/Index', ['tasks' => $tasks ]);
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
