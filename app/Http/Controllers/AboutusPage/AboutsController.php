<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequestForm;
use App\Models\Abouts;
use App\Services\AboutsService;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    public $aboutsService;

    public function __construct(AboutsService $aboutsService)
    {
        $this->aboutsService = $aboutsService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $AboutUs = $this->aboutsService->selectAbout();

        return view('AboutUs.main_aboutus', compact('AboutUs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
            return view('AboutUs.form');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutUsRequestForm $request)
    {
        //
        $validated = $request->validated();
        $about = $this->aboutsService->createAbout($validated);
         return redirect()->route('aboutus.index')->with('success', 'AboutUs created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $about = $this->aboutsService->selectAboutById($id);
        // return response()->json([
        //     'message' => 'Select About Us',
        //     'data' => $About
        // ]);
        return view('AboutUs.form', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $about = $this->aboutsService->selectAboutById($id);
        return view('AboutUs.form', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUsRequestForm $request,  $id)
    {
        //
        $validated = $request->validated();
        // dd($validated);
        $about = $this->aboutsService->updateAboutById($id , $validated);

    

         return redirect()->route('aboutus.index')->with('success', 'AboutUs update successfully!');
        }
        
        /**
         * Remove the specified resource from storage.
        */
        public function destroy($id)
        {
            //
            $about = $this->aboutsService->deleteAboutById($id);
            
            return redirect()->route('aboutus.index')->with('success', 'AboutUs Delete successfully!');

    }
}
