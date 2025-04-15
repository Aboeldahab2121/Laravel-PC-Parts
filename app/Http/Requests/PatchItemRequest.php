<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatchItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string',
            'image' => 'sometimes|string', // to store image path
            'price' => 'sometimes|integer',
            'quantity' => 'sometimes|integer',
            'category_id' => 'sometimes|nullable|exists:categories,id',  // manage the foreign key validation
        ];
    }
}
