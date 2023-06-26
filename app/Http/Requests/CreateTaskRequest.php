<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreateTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json([]));
    }
}
