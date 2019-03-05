<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Task;
use App\Profile;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   // public function index()
    //{

    //}
    public function destroy(Task $task){
        $task->delete();
        return redirect()->route('home')->with('message', 'Deleted');
    }
    public function create()
    {
        $task = new Task;
        $edit = FALSE;
        return view('taskForm', ['task' => $task,'edit' => $edit ]);
    }
    public function store(Request $request)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $input = request()->all();
        $task = new Task($input);
        $task->user()->associate(Auth::user());
        $task->save();
        return redirect()->route('home')->with('message', 'IT WORKS!');
        // return redirect()->route('questions.show', ['id' => $question->id]);
    }
    public function show(Task $task)
    {
        return view('task')->with('task', $task);
    }
    public function edit(Task $task)
    {
        $edit = TRUE;
        return view('TaskForm', ['task' => $task, 'edit' => $edit]);
    }
    public function update(Request $request, Task $task)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $task->body = $request->body;
        $task->save();
        return redirect()->route('task.show',['task' => $task->id])->with('message', 'Saved');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
