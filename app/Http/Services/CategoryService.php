<?php

namespace App\Http\Services;

use App\Models\Category;

class CategoryService
{
    private FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function createCategory(array $categoryData)
    {
        $path = $this->fileService->upload($categoryData['image'], 'public');
        $categoryData['image'] = $path;
        $category = Category::create($categoryData);
        // event firing placeholder

        return $category;
    }

    public function updateCategory(array $categoryData, Category $category)
    {
        if (isset($categoryData['image'])) {
            $path = $this->fileService->upload($categoryData['image'], 'public');
            $categoryData['image'] = $path;
        }
        $category->update($categoryData);
        // event firing placeholder

        return $category;
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();
        // event firing placeholder
    }
}
