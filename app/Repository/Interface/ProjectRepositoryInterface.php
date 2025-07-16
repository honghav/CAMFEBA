<?php

namespace App\Repository\Interface;

interface ProjectRepositoryInterface 
{
    public function selectProjectAll();
    public function getProjectById(int $id);
    public function createProject(array $data);
    public function updateProject(int $id ,array $data);
    public function deleteProject(int $id);
}