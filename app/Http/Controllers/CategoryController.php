<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatchCategoryRequest;
use App\Http\Requests\PostCategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return Category::all();
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function store(PostCategoryRequest $request)
    {
        $categoryData = $request->validated();
        $category = $this->categoryService->createCategory($categoryData);
        $category->image = asset($category->image);

        return response()->json($category, Response::HTTP_CREATED);
    }

    public function update(PatchCategoryRequest $request, Category $category)
    {
//        dd($request->all());
        $categoryData = $request->validated();
        $category = $this->categoryService->updateCategory($categoryData, $category);
        $category->image = asset($category->image);

        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $this->categoryService->destroyCategory($category);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
