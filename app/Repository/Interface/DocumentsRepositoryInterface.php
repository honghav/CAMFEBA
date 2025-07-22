<?php 

    namespace App\Repository\Interface;

interface DocumentsRepositoryInterface
    {
        public function getAllDocuments();
        public function getDocumentById($id);
        public function create(array $data);
        public function updateDocument($id, array $data);
        public function deleteDocument($id);
        public function getDocumentsByCategory($id);
    }