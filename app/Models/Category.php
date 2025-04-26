<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'image',
        'min_price',
    ];

    protected $guarded = [
        'id',
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
