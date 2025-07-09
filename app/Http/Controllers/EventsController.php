<?php

namespace App\Http\Controllers;

use App\Services\EventsService;
use Illuminate\Http\Request;

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

}
