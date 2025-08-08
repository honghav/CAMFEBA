<?php

    namespace App\Repository;

    use App\Repository\Interface\DocumentsRepositoryInterface;
    use App\Models\Documents;

class DocumentsRepository implements DocumentsRepositoryInterface
    {
        public function getAllDocuments()
        {
            return Documents::all();
        }

        public function getDocumentById($id)
        {
            return Documents::findOrFail($id);
        }

        public function create(array $data)
        {
            return Documents::create($data);
        }

        public function updateDocument($id, array $data)
        {
            $document = $this->getDocumentById($id);
            $document->update($data);
            return $document;
        }

        public function deleteDocument($id)
        {
            $document = $this->getDocumentById($id);
            return $document->delete();
        }

        public function getDocumentsByCategory($categoryId)
        {
            return Documents::where('technical_id', $categoryId)->get();
        }
        
    }