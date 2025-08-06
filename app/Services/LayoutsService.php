<?php 

namespace App\Services;
use App\Repository\Interface\LayoutsRepositoryInterface;

class LayoutsService 
{
    public $layoutsRepository;

    public function __construct(LayoutsRepositoryInterface $layoutsRepository)
    {
        $this->layoutsRepository = $layoutsRepository;
    }

    public function selectLayout()
    {
        return $this->layoutsRepository->getAllLayouts();
    }

    public function createLayout(array $data)
    {
        return $this->layoutsRepository->createLayout($data);
    }

    public function selectLayoutById($id)
    {
        return $this->layoutsRepository->getLayoutById($id);
    }

    public function updateLayoutById($id, array $data)
    {
        return $this->layoutsRepository->updateLayout($id, $data);
    }

    public function deleteLayoutById($id)
    {
        return $this->layoutsRepository->deleteLayout($id);
    }
    public function selectLayoutByPage($page)
    {
        return $this->layoutsRepository->getLayoutByPage($page);
    }
}