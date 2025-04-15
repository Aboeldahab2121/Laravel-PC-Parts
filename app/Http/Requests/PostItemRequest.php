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
            'image' => 'string|required', // to store image path
            'price' => 'integer|required',
            'quantity' => 'integer|required',
            // manage the foreign key validation
        ];
    }
}
