<?php

namespace App\Http\Controllers\TechnicalPage;

use App\Models\Technicals;
use App\Http\Controllers\Controller;
use App\Http\Requests\TechnicalRequest;
use App\Services\TechnicalsService;
use Illuminate\Http\Request;

class TechnicalsController extends Controller
{
    protected $technicalsService;

    public function __construct(TechnicalsService $technicalService)
    {
        $this->technicalsService = $technicalService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technical = 'technical';
        $selectTechnical = $this->technicalsService->getAll($technical);
        return view('ServicePage.technical_assistance', compact('selectTechnical'));
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
    public function store(TechnicalRequest $request)
    {
        //
            $validated = $request->validated();
            if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $path = $file->store('technicals', 'public'); // stores in storage/app/public/technicals
            $validated['file_path'] = $path;
        }
        // dd($validated);

    
        $technical = $this->technicalsService->create($validated);

        
        return redirect()->back()->with('success', 'Technical created successfully!');
        // return response()->json([
        //     'message' => 'Technical created successfully.',
        //     'data' => $technical
        // ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technicals $technicals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technicals $technicals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technicals $technicals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technicals $technicals)
    {
        //
    }
}
