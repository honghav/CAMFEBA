<?php

namespace App\Http\Controllers\AboutusPage;

use App\Http\Requests\AboutUsRequestForm;
use App\Models\Abouts;
use App\Http\Controllers\Controller;
use App\Models\Executive;
use App\Services\AboutsService;
use App\Services\LayoutsService;

use Illuminate\Http\Request;
use App\Services\ExcecutiveSevice;
use App\Http\Requests\ExcecutiveRequest;

class AboutsController extends Controller
{
    public $aboutsService;
    protected $executiveService;
    protected $layoutsService;

    public function __construct(AboutsService $aboutsService,ExcecutiveSevice $executiveService, LayoutsService $layoutsService)
    {
        $this->aboutsService = $aboutsService;
        $this->executiveService = $executiveService;
        $this->layoutsService = $layoutsService;
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
    public function indexExcetive()
    {
        $layout = 'about';
        // Select President
        $president = $this->executiveService->getPresident();
        // Select all bord 
        $memberbord = $this->executiveService->getBord();
        // Select layout 
        // $l1 = $this->layoutsService->selectLayoutByPage($namepage1);

        $bg = $this->layoutsService->selectLayoutByPage($layout);

        return view('AboutUs.executive_page', compact('president', 'memberbord', 'bg'));
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
