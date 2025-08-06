<?php 

namespace App\Repository\Interface;
Interface LayoutsRepositoryInterface
{
    public function getAllLayouts();
    public function getLayoutById($id);
    public function createLayout(array $data);
    public function updateLayout($id, array $data);
    public function deleteLayout($id);
    public function getLayoutByPage($page);
}