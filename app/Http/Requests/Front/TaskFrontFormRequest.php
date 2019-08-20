<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class TaskFrontFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          "title" => "required|max:180",
          "description" => "required",
          "skills" => "required",
        ];
    }

    public function messages()
    {
        return [
          'title.required' => __('Please enter Task title'),
          'description.required' => __('Please enter Task description'),
          'skills.required' => __('Please enter Task skills'),
        ];
    }
}
