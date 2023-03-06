<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::query()
            ->where('user_id',auth()->id())
            ->orderByDesc('date')
            ->paginate(15);
        return view('admin.task.index',compact('tasks'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request,[
           'title' => 'required',
           'date' => 'required|date',
        ]);
        $request['user_id'] = auth()->id();
        Task::query()->create($request->all());
        Session::flash('success','Task has been added!');
        return redirect()->back()->with(['success'=>'Task has been added!']);
    }

    public function edit(Request $request)
    {
        $task = Task::query()->findOrFail($request->get('id'));
        return view('admin.task._edit',compact('task'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'date' => 'required|date',
        ]);
        $data = Task::query()->find($id);
        $data->update($request->all());
        Session::flash('success','Task has been updated!');
        return redirect()->back()->with('success','Updated successfully');
    }

    public function destroy($id)
    {
        $tasks = Task::query()->findOrFail($id);
        $tasks->delete();
        return redirect('tasks');
    }

    public function done(Request $request)
    {
        $id = $request->get('id');
        $task = Task::query()->findOrFail($id);
        if($task->is_done == 1){
            $task->update(['is_done'=>null]);
        }else{
            $task->update(['is_done'=>1]);
        }
    }
}
