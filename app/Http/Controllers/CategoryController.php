<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatchCategoryRequest;
use App\Http\Requests\PostCategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;
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

        return response()->json($category , Response::HTTP_CREATED);
    }

    public function update(PatchCategoryRequest $request , Category $category)
    {
        $validated = $request->validated();
        $category = $this->categoryService->updateCategory($validated , $category);

        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $this->categoryService->destroyCategory($category);

        return response()->json(Response::HTTP_NO_CONTENT);
    }
}
