<?php
 
     namespace App\Repository;
    // namespace App\Repository\Interface;

    use App\Repository\Interface\CategoryLegalRepositoryInterface;
    use App\Models\LegalCategory;

    class CategoryLegalRepository implements CategoryLegalRepositoryInterface
    {
        public function getAllCategories()
        {
            return LegalCategory::all();
        }
        public function getCategoryById($id)
        {
            return LegalCategory::where('id', $id)->first();
        }
        public function createCategory(array $data)
        {
            $category = new LegalCategory($data);
            return $category->save();
        }
        public function updateCategory($id, array $data)
        {
            $findData = $this->getCategoryById($id);
            return $findData->update($data);
        }
        public function deleteCategory($id)
        {
            $findData = $this->getCategoryById($id);
            return $findData->delete();
        }
    }