<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatchUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $this->route('user')->id,
            'password' => 'sometimes',   //['sometimes', Password::default()],
            'role' => 'sometimes|string'
        ];
    }
}
