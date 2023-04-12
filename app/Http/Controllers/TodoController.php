<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;


class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos;
        return view('todos.index', compact('todos'));
    }

    public function updTask(Todo $todo)
    {
        if (!$todo)
        {
            return to_route('todos.create');  
        }
        else
        {   
            return view('todos.edit',compact('todo'));
        } 
    }

    public function create()
    {
        return view('todos.create');
    }

    public function update(TodoRequest $request)
     {
            $request->user()->todos()->create([
                'title'=>$request->title,
                'description'=>$request->description,
                'is_completed'=>$request->status,
               ]);
            $request->session()->flash('alert-success', 'Success'); 
            return to_route('todos.index');
    }

    public function edit (TodoRequest $request, Todo $todo)
    {
        if (!$todo){
            return to_route('todos.index')->withErrors([
                'error'=> 'Task not finded!'
            ]);
        }
        
        $todo->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_completed'=>$request->status
        ]);
        $request->session()->flash('alert-success', 'updated success'); 
        return to_route('todos.index');
    }

    public function show($id)
    {
        $task = Todo::find($id);
        if ($task){
            return view('todos.show', compact('task'));
        }
        return to_route('todos.index')->withErrors([
            'error'=> 'Task not finded!'
        ]);
    }

    public function delete(Todo $todo)
    {
        
        $this->authorize('destroy', $todo);
 
        $todo->delete();
    
        return to_route('todos.index');
    }
}
