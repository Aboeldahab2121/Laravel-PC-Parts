<?php

namespace App\Http\Services;

use App\Models\Category;

class CategoryService
{
    public function createCategory(array $categoryData)
    {
        $category = Category::create($categoryData);
        // event firing placeholder

        return $category;
    }

    public function updateCategory(array $categoryData , Category $category)
    {
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
