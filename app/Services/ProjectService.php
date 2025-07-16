<?php

namespace App\Services;

use App\Repository\Interface\ProjectRepositoryInterface;

class ProjectService
{
    public $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository; 
    }

    public function selectProject()
    {
        return $this->projectRepository->selectProjectAll();
    }
    public function getProject($id)
    {
        return $this->projectRepository->getProjectById($id);
    }

    public function createProject(array $data)

    {
        return $this->projectRepository->createProject($data);
    }
    public function updateProject(int $id, array $data)
    {
        $get = $this->getProject($id);
        return $this->projectRepository->updateProject($id , $data);
    }
    
    public function deleteProject(int $id)
    {
        return $this->projectRepository->deleteProject($id);
    }

}