<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Repositories\ReminderRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    /**
     * @var ReminderRepository
     */
    protected $repository;

    public function __construct(ReminderRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $reminders = Reminder::query()
            ->where('user_id',auth()->id())
            ->paginate(15);
        $repository = $this->repository;
        return view('admin.reminder.index',compact('reminders','repository'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'title' => 'required',
            'date' => 'required|date'
        ]);
        $request['user_id'] = auth()->id();
        Reminder::query()->create($request->all());
        return redirect()->back()->with(['success'=>'Reminder has been added']);
    }


    public function edit(Request $request)
    {
        $reminder = Reminder::query()->findOrFail($request->get('id'));
        $repository = $this->repository;
        return view('admin/reminder/_edit',compact('reminder','repository'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'date' => 'required|date'
        ]);
        $data = Reminder::query()->find($id);
        $data->update($request->all());
        return redirect()->back()->with('success','Updated successfully');
    }


    public function destroy($id)
    {
        $tasks = Reminder::query()->findOrFail($id);
        $tasks->delete();
        return redirect('reminders');
    }

    public function done(Request $request)
    {
        $id = $request->get('id');
        $reminder = Reminder::query()->findOrFail($id);
        if($reminder->is_done == 1){
            $reminder->update(['is_done'=>null]);
        }else{
            $reminder->update(['is_done'=>1]);
        }
    }
}
