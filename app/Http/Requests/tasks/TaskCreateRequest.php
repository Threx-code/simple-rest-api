<?php

namespace App\Http\Requests\tasks;

use App\Helpers\TaskHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', Rule::unique('tasks', 'title')],
            'description' => ['required', 'string'],
            'task_file' => ['nullable', 'file'],
        ];
    }
}
