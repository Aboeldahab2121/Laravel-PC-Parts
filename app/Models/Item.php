<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Item extends Model
{
    protected $fillable = [
        'title',
        'image',
        'price',
        'quantity'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
