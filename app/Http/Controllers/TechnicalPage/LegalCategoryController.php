<?php

namespace App\Http\Controllers\TechnicalPage;

use App\Http\Requests\CatLegalFormRequest;
use App\Http\Controllers\Controller;
use App\Models\LegalCategory;
use Illuminate\Http\Request;
use App\Services\CategoryLegalService;
use Illuminate\Support\Facades\Log;

class LegalCategoryController extends Controller
{
    public $legalCategoryService;

    public function __construct(CategoryLegalService $legalCategoryService)
    {
        $this->legalCategoryService = $legalCategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = $this->legalCategoryService->getAllCategories();
        return view('ServicePage.legalcategory', compact('categories'));
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
    public function store(CatLegalFormRequest $request)
    {
        try {
            $validated = $request->validated();
            
            // Debug validation data
            Log::info('Validation passed:', $validated);
            
            $result = $this->legalCategoryService->createCategory($validated);
            
            if ($result['success']) {
                return response()->json([
                    'status' => 'success',
                    'message' => $result['message'],
                    'data' => $result['data'] ?? null
                ], 200);
            }

            return response()->json([
                'status' => 'error',
                'message' => $result['message'],
                'errors' => $result['errors'] ?? []
            ], 422);

        } catch (\Exception $e) {
            Log::error('Category creation failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create category',
                'errors' => $request->validator->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $category = $this->legalCategoryService->getCategoryById($id);

        return view('ServicePage.legalcategory', compact('category'));
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
