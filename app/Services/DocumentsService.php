<?php 

    namespace App\Services;

    use App\Repository\Interface\DocumentsRepositoryInterface;

    class DocumentsService
    {
        protected $documentsRepository;

        public function __construct(DocumentsRepositoryInterface $documentsRepository)
        {
            $this->documentsRepository = $documentsRepository;
        }

        public function getAllDocuments()
        {
            return $this->documentsRepository->getAllDocuments();
        }

        public function getDocumentById($id)
        {
            return $this->documentsRepository->getDocumentById($id);
        }

        public function createDocument(array $data)
        {
            return $this->documentsRepository->create($data);
        }

        public function updateDocument($id, array $data)
        {
            return $this->documentsRepository->updateDocument($id, $data);
        }

        public function deleteDocument($id)
        {
            return $this->documentsRepository->deleteDocument($id);
        }
    }