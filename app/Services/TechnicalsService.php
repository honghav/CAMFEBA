<?php namespace App\Services;

use App\Repository\Interface\TechnicalRepositoryInterface;

class TechnicalsService
{
    protected $technicalRepo;

    public function __construct(TechnicalRepositoryInterface $technicalRepo)
    {
        $this->technicalRepo = $technicalRepo;
    }

    public function getAll($category_page)
    {
        return $this->technicalRepo->getAllTechnicals($category_page);
    }

    public function getById($id)
    {
        return $this->technicalRepo->getTechnicalById($id);
    }

    public function create(array $data)
    {
        return $this->technicalRepo->createTechnical($data);
    }

    public function update($id, array $data)
    {
        return $this->technicalRepo->updateTechnical($id, $data);
    }

    public function delete($id)
    {
        return $this->technicalRepo->deleteTechnical($id);
    }
    public function categorypage($page)
    {
        return $this->technicalRepo->getAllTechnicalsBytype($page);
    }
}
