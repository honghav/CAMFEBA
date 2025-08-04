<?php

namespace App\Http\Controllers\EventsPage;

use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Services\EventsService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventsController extends Controller
{
    //
    protected $eventsService;

    public function __construct(EventsService $eventsService)
    {
        $this->eventsService = $eventsService;
    }

    public function mainPageEvent()
    {
        $events = $this->eventsService->getAllEvent();
        return view('Event.mainevent', compact('events'));
    }

    public function detailPageEvent($id)
    {
        $event = $this->eventsService->getEventById($id);
        return view('Event.eventdetail', compact('event'));
    }

    public function create()
    {
        return view('Event.create');
    }
    public function store(EventRequest $request) 
    {   
        
        $validated = $request->validated();

        // dd($validated);
        
        
        // $event = new Events($validated);
        // $event->save();


         $event = $this->eventsService->setNewsEvent($request->validated());
        // dd($createnew);            
        // success: redirect to event list with success message
        return redirect()->route('events')->with('success', 'Event created successfully!');
        
        // return response()->json([
        // 'message' => 'Event created successfully!',
        // 'data' => $validated
        // ], 201);

    }
}
