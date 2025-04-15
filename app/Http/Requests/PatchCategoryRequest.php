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
            'title' => 'string|sometimes|max:255',
            'image' =>'string|sometimes', // storing the image path
            'min_price' => 'integer|sometimes'
        ];
    }
}
