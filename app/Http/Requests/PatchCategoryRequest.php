<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatchCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg', // storing the image path
            'min_price' => 'sometimes|integer',
        ];
    }
}
