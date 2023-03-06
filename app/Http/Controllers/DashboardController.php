<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reminder;
use App\Models\Task;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var EventRepository
     */
    protected $repository;

    public function __construct(EventRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $events = Event::query()->where('user_id',auth()->id())->get();
        $reminders = Reminder::query()->where('user_id',auth()->id())->get();
        $tasks = Task::query()->where('user_id',auth()->id())->get();
        return view('index',compact('events','reminders','tasks'));
    }

    /* Ajax Controller Start */
    public function create(Request $request)
    {
        $date = $request->get('date');
        $repository = $this->repository;
        return view('admin._add',compact('date','repository'));
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $type = $request->get('type');
        $repository = $this->repository;

        if($type == 'event'){
            $event = Event::query()->findOrFail($id);
            return view('admin.event._edit',compact('event','repository'));
        }elseif($type == 'reminder'){
            $reminder = Reminder::query()->findOrFail($id);
            return view('admin.reminder._edit',compact('reminder','repository'));
        }elseif($type == 'task'){
            $task = Task::query()->findOrFail($id);
            return view('admin.task._edit',compact('task','repository'));
        }else{
            return 'Something went wrong';
        }
    }
}
