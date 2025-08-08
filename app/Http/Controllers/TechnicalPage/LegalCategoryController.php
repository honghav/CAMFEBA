<?php

namespace App\Http\Controllers\TechnicalPage;

use App\Http\Requests\CatLegalFormRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequestForm;
use App\Models\LegalCategory;
use Illuminate\Http\Request;
use App\Services\CategoryLegalService;
use App\Services\DocumentsService;
use App\Services\TechnicalsService;
use Illuminate\Support\Facades\Log;

class LegalCategoryController extends Controller
{
    public $legalCategoryService;
    public $technicalsService;
    public $documentService;

    public function __construct(CategoryLegalService $legalCategoryService, TechnicalsService $technicalsService, DocumentsService $documentService)
    {
        $this->legalCategoryService = $legalCategoryService;
        $this->technicalsService = $technicalsService;
        $this->documentService = $documentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $technical = 'legal';
        $selectTechnical = $this->technicalsService->getAll($technical);
        $category = $this->technicalsService->categorypage($technical);

        return view('ServicePage.DocumentLegal.legal_regulation', compact('selectTechnical','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('legal_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequestForm $request)
    {
    
            $validated = $request->validated();
            
            // Handle file uploads
           if ($request->hasFile('cover')) {
                $coverFile = $request->file('cover');
                $coverName = time() . '_' . $coverFile->getClientOriginalName(); // e.g. 1691500000_myimage.jpg
                $validated['cover'] = $coverFile->storeAs('covers', $coverName, 'public');
            }

            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $fileName = time() . '_' . $file->getClientOriginalName(); // e.g. 1691500000_document.pdf
                $validated['file_path'] = $file->storeAs('files', $fileName, 'public');
            }


            // Call the service method to create the record, passing validated data including file paths
            $result = $this->legalCategoryService->createCategory($validated);

            // Return a JSON response indicating success or failure
            return response()->json([
                'success' => true,
                'message' => 'Document created successfully',
                'data' => $result,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        // $page = 
        $layout = $this->technicalsService->getById($id);
        // $category = $this->legalCategoryService->getAllCategories();

        $documents = $this->documentService->getDocumentsByCategory($layout->id);
        // $category = $this->technicalsService->categorypage($page);
        return view('ServicePage.DocumentLegal.documentpage', compact('documents','layout'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LegalCategory $legalCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CatLegalFormRequest $request, $id)
    {
        //
        $data = $request->validated();
        $this->legalCategoryService->updateCategory($id, $data);
        return redirect()->route('legal_categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LegalCategory $legalCategory)
    {
        //
        $this->legalCategoryService->deleteCategory($legalCategory->id);
        return redirect()->route('legal_categories.index')->with('success', 'Category deleted successfully.');
    }
}
