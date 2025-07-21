<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequestForm;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $project = $this->projectService->selectProject();
        return view('Projects.main_project', compact('project'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Projects.form_project');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequestForm $request)
    {
        //
        $data = $request->validated();
        $createproject = $this->projectService->createProject($data);

        return redirect()->route('project.index')
                         ->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $projectById = $this->projectService->getProject($id); 
        return view('Projects.detail_project' , compact('projectById'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $project = $this->projectService->getProject($id); 
        return view('Projects.form_project', compact('project'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(ProjectRequestForm $request, $id)
    {
        //
        $validated = $request->validated();
        
        $update = $this->projectService->updateProject($id , $validated);
        return response()->json(
            [
                'message' => 'Update data is success',
                'data' => $update
                ]
            );
            
        }
        
        /**
         * Remove the specified resource from storage.
        */
        public function destroy($id)
        {
            $delete = $this->projectService->deleteProject($id);
           return redirect()->route('project.index')
                         ->with('success', 'Project created successfully!');
    }

    
}
