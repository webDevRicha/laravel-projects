<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToDoListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'new_task' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'new_task.required' => 'The task field is required.',
            'new_task.string' => 'The task field must be a string.',
            'new_task.max' => 'The task field must not exceed 255 characters.',
        ];
    }
}
