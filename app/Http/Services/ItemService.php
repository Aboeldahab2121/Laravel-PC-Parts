<?php

namespace App\Http\Services;

use App\Models\Item;

class ItemService
{
    public function createItem(array $itemData)
    {
        $item = Item::create($itemData);
        // event firing placeholder

        return $item;
    }

    public function updateItem(array $itemData , Item $item)
    {
        $item->update($itemData);
        // event firing placehoItem

        return $item;
    }

    public function destroyItem(Item $item)
    {
        $item->delete();
        // event firing placeholder
    }
}
