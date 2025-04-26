<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Item;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ItemService
{
    private FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function createItem(array $itemData)
    {
        $category = Category::findOrFail($itemData['category_id']);
        if ($itemData['price'] < $category->min_price) {
            throw new BadRequestHttpException('Item price can not be less than category minimum price');
        }
        $path = $this->fileService->upload($itemData['image'], 'public');
        $itemData['image'] = $path;
        $item = Item::create($itemData);
        // event firing placeholder

        return $item;
    }

    public function updateItem(array $itemData, Item $item)
    {
        $item->update($itemData);
        // event firing placeholder

        return $item;
    }

    public function destroyItem(Item $item)
    {
        $item->delete();
        // event firing placeholder
    }
}
