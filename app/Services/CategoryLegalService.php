<?php 

    namespace App\Services;

    use App\Repository\Interface\CategoryLegalRepositoryInterface;
    use Illuminate\Support\Facades\Storage;

    class CategoryLegalService
    {
        protected $categoryLegalRepository;

        public function __construct(CategoryLegalRepositoryInterface $categoryLegalRepository)
        {
            $this->categoryLegalRepository = $categoryLegalRepository;
        }

        public function getAllCategories()
        {
            return $this->categoryLegalRepository->getAllCategories();
        }

        public function getCategoryById($id)
        {
            return $this->categoryLegalRepository->getCategoryById($id);
        }

        public function createCategory(array $data)
        {
            try {
                // Handle cover image upload if present
                if (isset($data['cover']) && $data['cover']->isValid()) {
                    $filename = time() . '_' . $data['cover']->getClientOriginalName();
                    $path = $data['cover']->storeAs('legal-categories', $filename, 'public');
                    $data['cover'] = $path;
                }

                // Create category with processed data
                $category = $this->categoryLegalRepository->createCategory($data);

                return [
                    'success' => true,
                    'data' => $category,
                    'message' => 'Category created successfully'
                ];

            } catch (\Exception $e) {
                // Clean up uploaded file if category creation fails
                if (isset($path) && Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }

                return [
                    'success' => false,
                    'message' => 'Failed to create category: ' . $e->getMessage()
                ];
            }
        }

        public function updateCategory($id, array $data)
        {
            return $this->categoryLegalRepository->updateCategory($id, $data);
        }

        public function deleteCategory($id)
        {
            return $this->categoryLegalRepository->deleteCategory($id);
        }
}