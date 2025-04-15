<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Category extends Model
{
    protected $fillable = [
        'title',
        'image',
        'min_price',
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
