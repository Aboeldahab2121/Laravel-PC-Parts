<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostItemRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',  // manage the foreign key validation
        ];
    }
}
