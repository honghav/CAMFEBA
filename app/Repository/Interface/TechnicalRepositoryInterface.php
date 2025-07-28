<?php 

namespace App\Repository\Interface;

Interface TechnicalRepositoryInterface
{
    public function getAllTechnicals();
    public function getTechnicalById($id);
    public function createTechnical(array $data);
    public function updateTechnical($id, array $data);
    public function deleteTechnical($id);
}