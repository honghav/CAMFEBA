<?php 

    namespace App\Repository\Interface;

    interface CategoryLegalRepositoryInterface
    {
        public function getAllCategories();
        public function getCategoryById($id);
        public function createCategory(array $data);
        public function updateCategory($id, array $data);
        public function deleteCategory($id);
    }