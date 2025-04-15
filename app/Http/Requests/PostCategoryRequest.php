<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'string|required|max:255',
            'image' =>'string|required', // storing the image path
            'min_price' => 'integer|required'
        ];
    }
}
