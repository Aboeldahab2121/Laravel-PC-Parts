<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatchItemRequest;
use App\Http\Requests\PostItemRequest;
use App\Http\Services\ItemService;
use App\Models\Item;
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
        $item->image = asset($item->image);

        return response()->json($item, Response::HTTP_CREATED);
    }

    public function update(PatchItemRequest $request, Item $item)
    {
        $itemData = $request->validated();
        $item = $this->itemService->updateItem($itemData, $item);

        return response()->json($item);
    }

    public function destroy(Item $item)
    {
        $this->itemService->destroyItem($item);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
