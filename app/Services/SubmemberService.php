<?php 

namespace App\Services;

use App\Repository\Interface\SubmemberRepositoryInterface;

class SubmemberService
{
    protected $submemberRepository;

    public function __construct(SubmemberRepositoryInterface $submemberRepository)
    {
        $this->submemberRepository = $submemberRepository;
    }

    public function getAllSubmembers()
    {
        return $this->submemberRepository->getAllSubmembers();
    }

    public function getSubmemberById($id)
    {
        return $this->submemberRepository->getSubmemberById($id);
    }
    public function getSubmemberByUserId($id)
    {
        return $this->submemberRepository->getSubmemberByUserId($id);
    }

    public function createSubmember(array $data)
    {
        return $this->submemberRepository->createSubmember($data);
    }

    public function updateSubmember($id, array $data)
    {
        return $this->submemberRepository->updateSubmember($id, $data);
    }

    public function deleteSubmember($id)
    {
        return $this->submemberRepository->deleteSubmember($id);
    }

    public function searchSubmembers($query)
    {
        return $this->submemberRepository->searchSubmembers($query);
    }
}