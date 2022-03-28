<?php

namespace App\Http\Requests\Management\Roles;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:roles,name',],
            'permissions' => ['sometimes', 'array'],
            'permissions.*' => ['required', 'exists:permissions,name']
        ];
    }
}
