<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatchCategoryRequest;
use App\Http\Requests\PostCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
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
        $validated = $request->validated();
        $category = Category::create($validated);

        return response()->json($category , Response::HTTP_CREATED);
    }

    public function update(PatchCategoryRequest $request , Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);

        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(Response::HTTP_NO_CONTENT);
    }
}
