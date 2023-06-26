<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CommnetCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'text' => ['required', 'string', 'min:5'],
            'task_id' => ['required', 'exists:App\Models\Task,id']
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => 'Текст комментария обязательный',
            'text.min' => 'Текст комментария должен быть больше 5 символов',
            'task_id.required' => 'Id задачи обязательный параметр',
            'task_id.exists' => 'Такой задачи не существует'
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'errors' => $validator->errors()
        ], 422));
    }
}
