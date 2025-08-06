<?php

namespace App\Services;

use App\Repository\Interface\QouteRepositoryInterface;

class QouteService
{
    protected $qouteRepository;

    public function __construct(QouteRepositoryInterface $qouteRepository)
    {
        $this->qouteRepository = $qouteRepository;
    }

    public function getAllQoutes()
    {
        return $this->qouteRepository->getAllQoutes();
    }

    public function getQouteById($id)
    {
        return $this->qouteRepository->getQouteById($id);
    }
    public function createQoute(array $data)
    {
        return $this->qouteRepository->createQoute($data);
    }
    public function updateQoute($id, array $data)
    {
        return $this->qouteRepository->updateQoute($id, $data);
    }
    public function deleteQoute($id)
    {
        return $this->qouteRepository->deleteQoute($id);
    }
    public function searchQoutes($query)
    {
        return $this->qouteRepository->searchQoutes($query);
    }
    
}