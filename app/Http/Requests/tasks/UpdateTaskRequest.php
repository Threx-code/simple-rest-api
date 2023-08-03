<?php

namespace App\Http\Requests\tasks;

use App\Helpers\TaskHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
        $url = explode('tasks/', request()->url());
        $taskId = $url[1];
        return [
            'title' => ['nullable', 'string',
                Rule::unique('tasks', 'title')->ignore($taskId)
            ],
            'description' => ['nullable', 'string'],
            'task_file' => ['nullable', 'file'],
            'completed' => ['nullable', 'between:0,1'],
        ];
    }
}
