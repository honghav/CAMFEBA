<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\LayoutsService;
use App\Services\QouteService;
use App\Http\Requests\QouteRequest;
use App\Services\AboutsService;
use App\Services\EventsService;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    protected $layoutsService;
    protected $qouteService;
    protected $eventsService;
    protected $aboutusService;
    public function __construct(LayoutsService $layoutsService, QouteService $qouteService , EventsService $eventsService, AboutsService $aboutusService)
    {
        $this->qouteService = $qouteService; // Injecting the QouteService to handle quote-related operations
        // Injecting the LayoutsService to handle layout-related operations
        $this->eventsService = $eventsService; // Injecting the EventsService to handle event-related operations
        $this->layoutsService = $layoutsService; 
        $this->aboutusService = $aboutusService;       
    }
    public function index()
    {
        // Select layouts for different pages
        $namepage1 = 'home1'; 
        $namepage2 = 'home2'; 
        $namepage3 = 'home3'; 
        $l1 = $this->layoutsService->selectLayoutByPage($namepage1);
        $l2= $this->layoutsService->selectLayoutByPage($namepage2);
        $l3 = $this->layoutsService->selectLayoutByPage($namepage3);
        // Select quotes for the homepage
        $selectQoute = $this->qouteService->getAllQoutes(); // Fetching all quotes
        // Select events for the homepage
        $events = $this->eventsService->getAllEvent(); // Fetching all events
        // Select what member Say?
        $what = $this->aboutusService->WhatmemberSay();
        return view('Homepage.mainhome' ,compact('l1', 'l2', 'l3', 'selectQoute', 'events', 'what'));
    }
    public function store(QouteRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            // Get original extension
            $extension = $file->getClientOriginalExtension();
            // Create custom filename: qouteName_YYYYMMDD.ext
            $filename = Str::slug($validated['name']) . '_' . now()->format('Ymd') . '.' . $extension;
            // Store the file with custom name
            $path = $file->storeAs('qoutes', $filename, 'public');
            // Save path to validated data
            $validated['file_path'] = $path;
        }

        $this->qouteService->createQoute($validated);
        return redirect()->route('homepage.index')->with('success', 'Quote created successfully!');
    }
}
