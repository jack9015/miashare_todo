<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Role;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    
    public function index(){
        if (auth()->user()->hasRole(Role::ADMIN)) {
            $tasks = Task::all();
        } else {
            $tasks = Task::where([['user_id', '=', auth()->user()->id], ['task_status', '!=', Task::REMOVED]])->get();
        }
        return view('tasks.index', compact('tasks'));
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $request->validate([
            'task_name' => ['required'],
            'task_details' => ['required']
        ]);

        Task::create([
            'task_name' => $request->get('task_name'),
            'task_details' => $request->get('task_details'),
            'user_id'=>auth()->user()->id,
            'task_status' => Task::ACTIVE
        ]);

        return redirect('/tasks')->with('msg', 'New to-do item added successfully!');
    }

    public function edit(Task $task){
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task, Request $request){
        $request->validate([
            'task_name' => ['required'],
            'task_details' => ['required']
        ]);

        $task->update([
            'task_name' => $request->get('task_name'),
            'task_details' => $request->get('task_details')
        ]);

        return redirect('/tasks')->with('msg', 'To-do item updated successfully');
    }

    public function destroy(Task $task){
        $task->update([
            'task_status' => Task::REMOVED
        ]);
        return redirect('/tasks')->with('deleted', 'To-do item deleted successfully');
    }

    public function show(Task $task){
        return view('tasks.show', compact('task'));
    }

    public function markTaskAsCompleted(Request $request){
        $id = $request->get('id');
        $task = Task::findOrFail($id);
        
        if ((Auth::user()->hasRole(Role::ADMIN)) || ($task->user_id == Auth::user()->id)) {
            $task->checkOffTask();
            if($task->task_status === Task::COMPLETED){
                return redirect()->back()->with('success', 'To-do item Completed!');
            }else{
                return redirect()->back();
            }
        }
    }
}
