<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasklists = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasklists' => $tasklists,
            ];
        }
        return view('tasks.index', $data);
    }

   
    public function create()
    {
        $task = new Task;
        
        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->tasks()->create([
            'content' => $request->content,
            'status'=> $request->status,
        ]);

        #return back();
        return redirect('/');
    }

    
    public function show($id)
    {
        $task = Task::find($id);
        if($task->user_id !== \Auth::user()->id) {
            return redirect('/');
        }
        
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    
    public function edit($id)
    {
        $task = Task::find($id);
        
        if($task->user_id !== \Auth::user()->id) {
            return redirect('/');
        }
        
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:10',
        ]);
        
        $task = Task::find($id);
        if($task->user_id !== \Auth::user()->id) {
            return redirect('/');
        }
        
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }

    
    public function destroy($id)
    {
        
        $task = Task::find($id);
        if($task->user_id !== \Auth::user()->id) {
            return redirect('/');
        }
        $task->delete();
        
        return redirect('/');
        
    }
    
}
