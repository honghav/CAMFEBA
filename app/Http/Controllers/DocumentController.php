<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequestForm;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Services\DocumentsService;

class DocumentController extends Controller
{
    public $documentService;
    public function __construct(DocumentsService $documentService)
    {
        $this->documentService = $documentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $documents = $this->documentService->getAllDocuments();
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequestForm $request)
    {
        //
        $validated = $request->validated();
        $document = $this->documentService->createDocument($validated);
        if ($document) {
            return redirect()->route('documents.index')->with('success', 'Document created successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to create document');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id )
    {
        //
        $document = $this->documentService->getDocumentById($id);
        if ($document) {
            return view('documents.show', compact('document'));
        } else {    
            return redirect()->back()->with('error', 'Document not found');
        }

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
