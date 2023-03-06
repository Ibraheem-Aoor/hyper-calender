<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Repositories\EventRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
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
        $events = Event::query()
            ->where('user_id',auth()->id())
            ->orderByDesc('start_date')
            ->paginate(15);
        $repository = $this->repository;
        return view('admin.event.index',compact('events','repository'));
    }

    /**
     * Store event to database
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request,[
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);
        $request['user_id'] = auth()->id();
        Event::query()->create($request->all());
        return redirect()->back()->with(['success'=>'Event added to calendar']);
    }


    public function edit(Request $request)
    {
        $event = Event::query()->findOrFail($request->get('id'));
        $repository = $this->repository;
        return view('admin/event/_edit',compact('event','repository'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date'
        ]);
        $data = Event::query()->find($id);
        $data->update($request->all());
        return redirect()->back()->with('success','Updated successfully');
    }


    public function destroy($id)
    {
        $events = Event::query()->findOrFail($id);
        $events->delete();
        return redirect('events');
    }
}
