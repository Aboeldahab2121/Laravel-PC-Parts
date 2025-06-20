<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemViewController extends Controller
{
    public function index()
    {
        $items = Item::all();


        return view('cards', ['items' => $items]);
    }
}
