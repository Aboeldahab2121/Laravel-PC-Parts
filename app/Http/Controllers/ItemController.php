<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatchItemRequest;
use App\Http\Requests\PostItemRequest;
use App\Http\Services\ItemService;
use App\Models\Item;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    protected ItemService $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        return Item::all();
    }

    public function show($id)
    {
        return Item::findOrFail($id);
    }

    public function store(PostItemRequest $request)
    {
        $itemData = $request->validated();
        $item = $this->itemService->createItem($itemData);

        return response()->json($item , Response::HTTP_CREATED);
    }

    public function update(Item $oldItem , PatchItemRequest $request)
    {
        $itemData = $request->validated();
        $newItem = $this->itemService->updateItem($itemData , $oldItem);

        return response()->json($newItem);
    }

    public function destroy(Item $item)
    {
        $this->itemService->destroyItem($item);

        return response()->json(Response::HTTP_NO_CONTENT);
    }
}
