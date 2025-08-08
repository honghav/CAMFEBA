<?php

namespace App\Http\Controllers\TechnicalPage;

use App\Http\Requests\DocumentRequestForm;
use App\Models\Document;
use App\Services\CategoryLegalService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DocumentsService;
use App\Models\LegalCategory;
use Illuminate\Container\Attributes\Log;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log as FacadesLog;

class DocumentController extends Controller
{
    public $documentService;
    public $legalCategoryService;
    public function __construct(DocumentsService $documentService, CategoryLegalService $legalCategoryService)
    {
        $this->documentService = $documentService;
        $this->legalCategoryService = $legalCategoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = $this->legalCategoryService->getCategoryById(1);
        $documents = $this->documentService->getAllDocuments();
        return view('ServicePage.alldocument', compact('documents','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Format categories for BladeWind select
        $categories = LegalCategory::all()->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        })->toArray();

        // Debug categories
        // FacadesLog::info('Categories:', $categories);

        return view('ServicePage.formCreate', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequestForm $request)
    {
        //
        $validated = $request->validated();
        // $validated = $request->validated();
            
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
            // dd($validated);
            $document = $this->documentService->createDocument($validated);
            //  return response()->json([
            //     'success' => true,
            //     'message' => 'Document created successfully',
            //     'data' => $document,
            // ]);
            return redirect()->back()->with('error', 'Failed to create document');
    }

    /**
     * Display the specified resource.
     */
    public function show($id )
    {
        //
        $document = $this->documentService->getDocumentById($id);
        // if ($document) {
            return view('ServicePage.DocumentLegal.book_info', compact('document'));
        // } else {    
        //     return redirect()->back()->with('error', 'Document not found');
        // }

    }
    // Downlaod Function 
    public function download($id)
    {
        $document = $this->documentService->getDocumentById($id);

        // file_path should be like: files/1691500000_document.pdf
        $filePath = $document->file_path;

        if (!$filePath || !Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found');
        }

        // Optional: sanitize title for safe filename
        $safeTitle = preg_replace('/[^A-Za-z0-9_\-]/', '_', $document->title);

        return Storage::disk('public')->download($filePath, $safeTitle . '.pdf');
    }
        /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        //
        $document = $this->documentService->getDocumentById($id);
        if ($document) {
            return view('documents.edit', compact('document'));
        } else {
            return redirect()->back()->with('error', 'Document not found'); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentRequestForm $request, $id )
    {
        //
        $validated = $request->validated();
        $result = $this->documentService->updateDocument($id, $validated);
        if ($result) {
            return redirect()->route('documents.index')->with('success', 'Document updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update document');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id )
    {
        //
        $result = $this->documentService->deleteDocument($id);
        if ($result) {
            return redirect()->route('documents.index')->with('success', 'Document deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete document');
        }
    }
}
