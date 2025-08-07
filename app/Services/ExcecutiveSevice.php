<?php
 namespace App\Services;

use App\Repository\Interface\ExcecutiveRepositoryInterface;

class ExcecutiveSevice
{
    protected $executiveRepository;

    public function __construct(ExcecutiveRepositoryInterface $executiveRepository)
    {
        $this->executiveRepository = $executiveRepository;
    }

    public function getAllDocuments()
    {
        return $this->executiveRepository->all();
    }

    public function getDocumentById($id)
    {
        return $this->executiveRepository->find($id);
    }

    public function createDocument(array $data)
    {
        return $this->executiveRepository->create($data);
    }

    public function updateDocument($id, array $data)
    {
        return $this->executiveRepository->update($id, $data);
    }

    public function deleteDocument($id)
    {
        return $this->executiveRepository->delete($id);
    }
    public function getPresident()
    {
       return $this->executiveRepository->getExecutiveByrole('president');
        
    }
    public function getBord()
    {
        return $this->executiveRepository->getBordMember('president');
    }
}
