<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
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
        
         $this->eventsService->setNewsEvent($request->validated());
        // dd($createnew);            
        // success: redirect to event list with success message
        return redirect()->route('events.main')->with('success', 'Event created successfully!');
    }
}
