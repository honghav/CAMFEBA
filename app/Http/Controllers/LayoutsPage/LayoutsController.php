<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\LayoutsPage;

use App\Models\Layouts;
use App\Http\Controllers\Controller;
use App\Services\LayoutsService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Layoutform;

class LayoutsController extends Controller
{
    protected $layoutsService;
    public function __construct(LayoutsService $layoutsService)
    {
        $this->layoutsService = $layoutsService;        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $layouts = $this->layoutsService->selectLayout();
        return view('TableLayouts', compact('layouts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Layoutform $request)
    {
        //
        $validated = $request->validated();
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            // Get original extension
            $extension = $file->getClientOriginalExtension();
            // Create custom filename: layoutName_YYYYMMDD.ext
            $filename = Str::slug($validated['name']) . '_' . now()->format('Ymd') . '.' . $extension;
            // Store the file with custom name
            $path = $file->storeAs('layouts', $filename, 'public');
            // Save path to validated data
            $validated['file_path'] = $path;
        }

        $this->layoutsService->createLayout($validated);
        return redirect()->route('layouts.index')->with('success', 'Layout created successfully!');
    }
    
    
    /**
     * Display the specified resource.
    */
    public function show(Layouts $layouts)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
    */
    public function edit(Layouts $layouts)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
    */
    public function update(Layoutform $request, $id)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('layouts', 'public');
            $validated['file_path'] = $path;
        }
        // dd($request->file('file_path'), $validated);
        $this->layoutsService->updateLayoutById($id, $validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Layout updated successfully!',
            'data' => $validated
        ]);
        // return redirect()->route('layouts.index')->with('success', 'Layout created successfully!');
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layouts $layouts)
    {
        //
    }
}
